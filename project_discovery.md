# RasoiSeva Project Discovery & Specifications

This document "saves" our chat progress and the vision for the **RasoiSeva** software. It serves as the master record for the development process.

## Project Vision
**RasoiSeva** is a comprehensive Management Software (inspired by Petpooja) designed for restaurants and retail businesses. It focuses on a **Super Admin - Tenant** architecture where features are toggled based on the client's subscription.

## Core Architecture
*   **Technology Stack**: Core PHP & MySQL (Battle-tested, stable, and highly scalable).
*   **User Roles**:
    *   **Super Admin**: Has the "Power" to create clients, manage their logins, and enable/disable specific modules for them.
    *   **Clients (Tenants)**: Restaurant owners who see only the modules assigned to them by the Super Admin.
*   **Data Isolation**: Multi-tenant database design to ensure one restaurant cannot see another's data.

## Module Logic
The following modules are planned for the "Initial Batch":
1.  **Billing**: Core transaction management.
2.  **Inventory**: Raw material and stock tracking.
3.  **[PENDING]**: (User to confirm more modules like Payroll, KDS, CRM).

## Infrastructure
*   **Local Development**: XAMPP (`htdocs/RasoiSeva`).
*   **Scalability Path**: Designed to handle 10,000+ clients through optimized SQL indexing and clean PHP logic.

---

## Pending Decisions (Awaiting User Input)
To start the "Real Work" of coding, the following details are needed:

| Question | Status | Note |
| :--- | :--- | :--- |
| **Database Name** | ⏳ PENDING | Suggested: `rasoiseva_db` |
| **Initial Modules** | ⏳ PENDING | Besides Billing/Inventory. |
| **Default Admin Creds**| ⏳ PENDING | Suggested: `admin` / `admin123` |

---

**This file acts as a permanent record of our conversation. You can refer to it at any time.**
