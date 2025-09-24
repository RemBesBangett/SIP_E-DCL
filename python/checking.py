import tkinter as tk  
from tkinter import filedialog, messagebox  
import pandas as pd  
  
def convert_txt_to_excel():  
    txt_file = filedialog.askopenfilename(  
        title="Pilih file TXT",  
        filetypes=[("Text Files", "*.txt")]  
    )  
    if not txt_file:  
        return  
    excel_file = filedialog.asksaveasfilename(  
        title="Simpan file Excel",  
        defaultextension=".xlsx",  
        filetypes=[("Excel Files", "*.xlsx")]  
    )  
    if not excel_file:  
        return  
  
    try:  
        # Baca semua baris, pecah tab  
        rows = []  
        max_cols = 0  
        with open(txt_file, encoding='utf-8') as f:  
            for line in f:  
                if line.strip() == "":  
                    continue  # skip baris kosong  
                cols = line.rstrip('\n').split('\t')  
                rows.append(cols)  
                max_cols = max(max_cols, len(cols))  
        # Pastikan semua baris jumlah kolomnya sama  
        for i in range(len(rows)):  
            if len(rows[i]) < max_cols:  
                rows[i].extend([''] * (max_cols - len(rows[i])))  
        df = pd.DataFrame(rows)  
        df.to_excel(excel_file, index=False, header=False)  
        messagebox.showinfo("Sukses", f"File Excel berhasil dibuat:\n{excel_file}")  
    except Exception as e:  
        messagebox.showerror("Error", f"Gagal mengubah file:\n{e}")  
  
# GUI  
root = tk.Tk()  
root.title("TXT ke Excel Converter")  
  
frame = tk.Frame(root, padx=20, pady=20)  
frame.pack()  
label = tk.Label(frame, text="Konversi semua baris TXT ke Excel (.xlsx)", font=("Arial", 12))  
label.pack(pady=10)  
btn = tk.Button(frame, text="Pilih & Konversi File", command=convert_txt_to_excel, width=25)  
btn.pack(pady=15)  
  
root.mainloop()  