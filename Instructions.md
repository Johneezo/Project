
# 📘 Instruction Manual – AI-Driven Student Complaint Management System

## 1. Overview  
The **AI-Driven Student Complaint Management System** is a web-based platform designed for **students and administrators at Copperbelt University**. It allows students to **submit complaints** via a chatbot or manual entry, while administrators can **manage, track, and resolve complaints**. The system is built using:  
- **Flask (Python)** – Web framework  
- **PyTorch** – AI/Chatbot training  
- **MySQL + PHP** – Database & authentication  
- **HTML/CSS/Bootstrap** – Frontend interface  

---

## 2. System Requirements  

- **OS**: Windows 10 or Linux Ubuntu 20.04+  
- **Python**: Version 3.9 or higher  
- **Database**: MySQL (phpMyAdmin or Workbench)  
- **Libraries**: Flask, PyTorch, NLTK, SQLAlchemy  
- **Hardware**: 4GB+ RAM, 500MB free disk space  

---

## 3. Installation  

1. **Clone or download** the project folder.  
   ```bash
   git clone https://github.com/your-repo/ai-complaint-system.git
   cd ai-complaint-system
   ```  
2. **Set up virtual environment**  
   ```bash
   python -m venv venv
   source venv/bin/activate   # Linux/Mac
   venv\Scripts\activate      # Windows
   ```  
3. **Install dependencies**  
   ```bash
   pip install -r requirements.txt
   ```  
4. **Set up database** in MySQL:  
   - Create database: `complaint_system`  
   - Import schema from: `db_schema.sql`  
5. **Run application**  
   ```bash
   python app.py
   ```  
6. Open browser: `http://localhost:5000`  

---

## 4. Usage  

### 4.1 Student
- **Login/Register**: Access dashboard with valid Student ID.  
- **Submit Complaints**:  
  - Option A: Click chatbot floating icon → type complaint.  
  - Option B: Manual submission form.  
- **Track Complaints**: Use Ticket ID to check status.  

### 4.2 Administrator
- **Login**: Enter admin credentials.  
- **Manage Complaints**: View, update status (Pending → Resolved).  
- **Generate Reports**: Export complaint summary (Excel/PDF).  
- **Retrain Chatbot**: Upload updated `intents.json` → run `train.py` → restart app.  

---

## 5. Testing  

All testing follows **Unit Test → Integration Test → System Test**.  

- **Authentication Testing**: Verify student/admin login (valid & invalid credentials).  
- **Chatbot Testing**: Check valid queries, unrecognized queries, ticket creation.  
- **Complaint Management Testing**: Admin updates, resolves, and generates reports.  
- **Retraining Testing**: Add new intents and verify chatbot updates.  

👉 Detailed test cases are documented in `Unit_Test_Cases_AI_Complaint_System.docx`.  

---

## 6. File Structure  

```
/ai-complaint-system
│── app.py                 # Flask entry point
│── train.py               # Chatbot training script
│── intents.json           # Chatbot knowledge base
│── templates/             # HTML files
│── static/                # CSS, JS, images
│── models/                # Database models
│── db_schema.sql          # MySQL schema
│── Unit_Test_Cases.docx   # Test case documentation
│── README.md              # Instruction manual
```

---

## 7. Troubleshooting  

- **Flask not running** → Check if Python 3.9+ and Flask installed.  
- **Database errors** → Ensure MySQL service is running.  
- **Chatbot not responding** → Retrain using `python train.py`.  
- **Access denied** → Check user roles in DB.  

---

## 8. Authors  

- **Designed by:** John Kabunda  
- **Tester:** Darius Chungu  
- **Contributors:** Copperbelt University Project Team  

# Chatbot Deployment with Flask and JavaScript

## Initial Setup:
for Login/Sign up- You first have to have XAMPP run the Apache and the XAMPP
for activation *** venv\Scripts\activate
Then run python app.py-to open up the flask interface

```
STEPS FOR SETTING UP
Install dependencies
```
$ (venv) pip install Flask torch torchvision nltk
```
Install nltk package
```
$ (venv) python
>>> import nltk
>>> nltk.download('punkt')

Run
```
$ (venv) python train.py
```
This will dump data.pth file. And then run
the following command to test it in the console.
```
$ (venv) python chat.py
```
