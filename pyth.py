import tkinter as tk
from tkinter import filedialog
import pandas as pd
import matplotlib.pyplot as plt
import os  # Add this import for file name extraction

# Create a tkinter window
window = tk.Tk()
window.title("CSV File Analyzer")

# Function to open a file dialog for selecting a CSV file
def open_file():
    file_path = filedialog.askopenfilename(filetypes=[("CSV files", "*.csv")])
    if file_path:
        try:
            df = pd.read_csv(file_path, delimiter=';')
        except FileNotFoundError:
            print(f"File not found: {file_path}")
            return
        except Exception as e:
            print(f"Error loading CSV file: {str(e)}")
            return

        # Extract the file name (excluding extension) as the graph title
        file_name = os.path.splitext(os.path.basename(file_path))[0]

        # Check the columns in the DataFrame
        print("Columns in the CSV file:")
        print(df.columns)

        # Select columns for plotting
        x_column = 'time'
        y_columns = ['la vitesse', 'pv counter', 'sv counter']

        # Create a line plot for each selected column
        plt.figure(figsize=(7, 6))

        for column in y_columns:
            x_data = df[x_column]
            y_data = df[column]

            plt.plot(x_data, y_data, label=column)

        plt.xlabel(x_column)
        plt.ylabel("Value")
        plt.title(f"Graph for {file_name}")  # Use the extracted file name as the title
        plt.legend()
        plt.grid(True)

        # Add cursor tooltips

        plt.show()

# Create a button to open the file dialog
open_button = tk.Button(window, text="Open CSV File", command=open_file)
open_button.pack(pady=20)

# Start the tkinter main loop
window.mainloop()


