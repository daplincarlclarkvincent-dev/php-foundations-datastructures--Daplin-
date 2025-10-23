# 📚 Digital Library Organizer

A PHP-based mini project that demonstrates **Recursion**, **Hash Tables**, and **Binary Search Trees (BST)** through an interactive digital library interface.

---

## 🎯 Project Purpose

This project aims to simulate how a library system might use **recursive structures**, **associative arrays**, and **binary trees** to organize, display, and search for books efficiently.

It’s divided into **three main parts**:
1. **Recursive Directory Display** – shows book categories and subcategories.
2. **Hash Table (Associative Array)** – stores and retrieves detailed book info.
3. **Binary Search Tree** – organizes books alphabetically and supports efficient searching.

---

## ⚙️ How to Run

1. Install **XAMPP** (or any PHP-supported server).
2. Move this project folder to your `htdocs` directory:
C:\xampp\htdocs\digital-library-organizer

mathematica
Copy code
3. Run **Apache** in XAMPP Control Panel.
4. Open your browser and visit:
http://localhost/digital-library-organizer/

yaml
Copy code

---

## 📂 File Overview

| File | Description |
|------|--------------|
| `main.php` | Main page combining all parts |
| `recursion.php` | Displays categories recursively |
| `hashtable.php` | Displays book info using a hash table |
| `bst.php` | Builds and searches a Binary Search Tree |
| `README.md` | Documentation and instructions |

---

## 🖼️ Example Outputs

### 🪜 Part I – Recursive Display
Displays categories like:
Fiction
├── Fantasy
│ ├── Harry Potter
│ └── The Hobbit
└── Mystery
├── Sherlock Holmes
└── Gone Girl

mathematica
Copy code

### 🧠 Part II – Hash Table Search
Selecting **"The Hobbit"** shows:
Title: The Hobbit
Author: J.R.R. Tolkien
Year: 1937
Genre: Fantasy

yaml
Copy code

### 🌳 Part III – Binary Search Tree
- Inorder Traversal: shows books alphabetically
- Search for books like “Harry Potter, Becoming”

Result:
✅ Harry Potter: Found  
❌ Inferno: Not Found

---

## 👨‍💻 Developed With
- **PHP 8+**
- **Bootstrap 4**
- **Font Awesome**
- **XAMPP Local Server**

---

💡 *A fun and educational project for exploring fundamental data structures in PHP!*
