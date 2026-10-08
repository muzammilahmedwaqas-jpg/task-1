# Member Portal & Document Management System

A production-ready full-stack Laravel application that provides a secure self-service portal for members to manage profiles and upload documents, along with an administrative back-office to oversee users and inspect submitted files.

---

## 🌐 Live Application
- **Live URL**: [https://ironpulse-fitness-xgip.onrender.com](https://ironpulse-fitness-xgip.onrender.com)
- **Repository**: Public GitHub Repository
- **Hosting Platform**: Render Cloud (Dockerized Nginx + PHP-FPM)[cite: 6, 8]

---

## 🔑 Default Credentials

### 1. Administrator Account
- **Access Route**: `/login` (automatically redirects to `/admin` dashboard)
- **Email**: `admin@gmail.com`
- **Password**: `password`
- **Privileges**: Restricted `/admin` area access, member overview list, eager loaded document views, and unrestricted document downloads[cite: 7, 8].

### 2. Regular Member Account
- **Access Route**: `/login` (redirects to `/profile`)[cite: 7, 8]
- **Email**: `member1@portal.test` (or register a new member account via `/register`)[cite: 7, 8]
- **Password**: `password`[cite: 7, 8]
- **Privileges**: Manage personal account information, upload PDF files (max 25MB), view personal uploaded documents, and download owned files only[cite: 7, 8].

---

## 🚀 Key Features Implemented

1. **Authentication & Profile Management**:
   - Built with Laravel Breeze scaffolding extended with custom fields (`phone`).
   - Member profile view rendering account information and uploaded document histories[cite: 7, 8].

2. **File Validation & Storage**:
   - Custom `DocumentUploadRequest` enforcing strict PDF file validation up to 25MB.
   - Streamline storage configuration mapped to the public disk under `/storage/documents`.
   - Tuned Nginx `client_max_body_size 25M` and PHP directives (`upload_max_filesize = 25M`, `post_max_size = 25M`) to support large PDF payloads.

3. **Role Protection & Middleware**:
   - `is_admin` boolean flag on the authentication schema[cite: 6, 7].
   - Custom `AdminMiddleware` restricting access to `/admin` routes (aborts with 403 Forbidden for unprivileged sessions)[cite: 7, 8].

4. **Optimized Admin Operations**:
   - Member directory with eager loaded document counts (`with('documents')`) to eliminate N+1 query bottlenecks[cite: 7, 8].
   - Dedicated drill-down view showing member profile details and document records[cite: 7, 8].
   - Document download route refactored to allow administrators to bypass ownership verification checks[cite: 7, 8].

---

## 💻 Local Installation Guide

### Prerequisites
- PHP 8.2 or 8.4[cite: 8]
- Composer[cite: 6, 8]
- Node.js & NPM
- SQLite Extension

### Step-by-Step Setup

1. **Clone the repository**:
   ```bash
   git clone <YOUR_PUBLIC_GITHUB_REPO_URL>
   cd <REPO_FOLDER>