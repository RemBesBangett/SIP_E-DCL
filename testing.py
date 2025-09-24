import pandas as pd  
from tkinter import Tk, filedialog  
import os  
  
def col2num(col):  
    num = 0  
    for c in col:  
        if c.isalpha():  
            num = num * 26 + (ord(c.upper()) - ord('A')) + 1  
    return num - 1  
  
def pick_file(title):  
    root = Tk()  
    root.withdraw()  
    file_path = filedialog.askopenfilename(title=title, filetypes=[  
        ("Excel Files", "*.xlsx *.xls"),  
        ("CSV Files", "*.csv"),  
        ("All Files", "*.*")  
    ])  
    root.destroy()  
    return file_path  
  
def read_file(path):  
    ext = os.path.splitext(path)[1].lower()  
    if ext == '.csv':  
        return pd.read_csv(path)  
    else:  
        return pd.read_excel(path, header=0)  
  
# PILIH FILE  
print("Pilih file 1 (boleh .xlsx/.xls/.csv):")  
file1_path = pick_file("Pilih file 1")  
print("Pilih file 2 (boleh .xlsx/.xls/.csv):")  
file2_path = pick_file("Pilih file 2")  
print("Pilih file 3 (boleh .xlsx/.xls/.csv):")  
file3_path = pick_file("Pilih file 3")  
  
file1 = read_file(file1_path)  
file2 = read_file(file2_path)  
file3 = read_file(file3_path)  
  
# Ambil PO_NUMBER dari masing-masing file sesuai kolom  
po_col_file1 = col2num('A')  # File 1, kolom A  
po_col_file2 = col2num('H')  # File 2, kolom H  
po_col_file3 = col2num('A') # File 3, kolom AA  
  
df1 = file1.copy()  
df1['PO_NUMBER'] = file1.iloc[:, po_col_file1]  
  
df2 = file2.copy()  
df2['PO_NUMBER'] = file2.iloc[:, po_col_file2]  
  
df3 = file3.copy()  
df3['PO_NUMBER'] = file3.iloc[:, po_col_file3]  
  
# Merge bertahap berdasarkan PO_NUMBER  
merge1 = pd.merge(df1, df2, on='PO_NUMBER', how='outer', suffixes=('_1', '_2'))  
merged = pd.merge(merge1, df3, on='PO_NUMBER', how='outer', suffixes=('', '_3'))  
  
# -- MAPPING: Sesuaikan kolom output dengan mapping-mu --  
# Contoh: Output kolom 'CUST_NO' diambil dari file1 kolom B, dst  
mapping = {  
    'CUST_NO':      ('_1', 'B'),   # file1 kolom B  
    'SHIP':         ('_2', 'C'),   # file2 kolom C  
    'SUB_ROUTE':    ('_1', 'W'),   # file1 kolom W  
    'PART_DENSO':   ('_2', 'F'),   # file2 kolom F  
    'PART_CUST':    ('_1', 'I'),   # file1 kolom I  
    'DESC':         ('_2', 'G'),   # file2 kolom G  
    'LOT_KANBAN':   ('_1', 'N'),  
    'ORDER_KANBAN': ('_1', 'O'),  
    'ORDER_PCS':    ('_1', 'P'),  
    'PO_NUMBER_CUST':('_1', 'H'),  
    # dst... silakan lengkapi mapping sesuai kebutuhan  
    'PO_NUMBER':    ('', ''),      # langsung dari hasil merge  
}  

#   mapping = {  
#     'CUST_NO':      ('file_xls', 'B'),  
#     'SHIP':         ('file_xls', 'C'),  
#     'SUB_ROUTE':    ('file_txt', 'W'),  
#     'PART_DENSO':   ('file_xls', 'F'),  
#     'PART_CUST':    ('file_txt', 'I'),  
#     'DESC':         ('file_xls', 'G'),  
#     'LOT_KANBAN':   ('file_txt', 'N'),  
#     'ORDER_KANBAN': ('file_txt', 'P'),  
#     'ORDER_PCS':    ('file_xls', 'J'),  
#     'PO_NUMBER':    ('file_txt', 'H'),  
#     'CYCLE_DEL':    ('file_txt', 'BJ'),  
#     'DATE_ETD':     ('file_txt', 'T'),  
#     'TIME_ETD':     ('file_txt', 'T'),  
#     'DATE_ETA':     ('file_txt', 'AE'),  
#     'TIME_ETA':     ('file_txt', 'AE'),  
#     'SUPP_PLANT':   ('file_txt', 'C'),  
#     'SUPP_CODE':    ('file_txt', 'BJ'),  
#     'SUPP_NAME':    ('file_txt', 'Q'),  
#     'ORDER_DATE':   ('file_txt', 'U'),  
#     'ORDER_TIME':   ('file_txt', 'U'),  
#     'UPLOAD_BY':    ('', ''),  
#     'UPLOAD_TIME':  ('', ''),  
#     'UPLOAD_DATE':  ('', ''),  
#     'SHIPTO':       ('file_xls', 'D'),  
#     'DOCK':         ('file_xls', 'G'),  
#     'ROUTE':        ('file_xls', 'Y'),  
# }  
output = pd.DataFrame()  
output['PO_NUMBER'] = merged['PO_NUMBER']  
  
for col, (suffix, col_letter) in mapping.items():  
    if col == 'PO_NUMBER':  # Sudah diisi  
        continue  
    if not suffix or not col_letter:  
        output[col] = ''  
        continue  
    idx = col2num(col_letter)  
    # Pilih sumber sesuai suffix (hasil merge)  
    if suffix == '_1':  
        # Kolom dari file1 (df1)  
        if idx < df1.shape[1]:  
            output[col] = merged.iloc[:, list(df1.columns).index(df1.columns[idx])]  
        else:  
            output[col] = ''  
    elif suffix == '_2':  
        if idx < df2.shape[1]:  
            # +len(df1.columns)-1 karena merge1 gabungan df1+df2  
            output[col] = merged.iloc[:, list(df2.columns).index(df2.columns[idx]) + len(df1.columns)-1]  
        else:  
            output[col] = ''  
    elif suffix == '_3':  
        if idx < df3.shape[1]:  
            output[col] = merged.iloc[:, list(df3.columns).index(df3.columns[idx]) + len(df1.columns)+len(df2.columns)-2]  
        else:  
            output[col] = ''  
    else:  
        output[col] = ''  
  
# Simpan hasil  
output.to_excel('output_mapping.xlsx', index=False)  
print("File output_mapping.xlsx sudah dibuat.")  