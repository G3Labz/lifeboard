# Glorified Todo .NET 9 Web API Specification

Base URL: `http://localhost:5050/api`

## Organizations Endpoints (`/api/organizations`)

### 1. Get All Organizations
- **HTTP Method**: `GET /api/organizations`
- **Response**: `200 OK` `[ { "id": "guid", "name": "string", "description": "string", "createdAt": "iso-date", "updatedAt": "iso-date" } ]`

### 2. Get Organization By ID
- **HTTP Method**: `GET /api/organizations/{id}`
- **Response**: `200 OK` or `404 Not Found`

### 3. Create Organization
- **HTTP Method**: `POST /api/organizations`
- **Request Body**:
  ```json
  {
    "name": "Engineering Team",
    "description": "Core software dev team"
  }
  ```
- **Response**: `201 Created`

### 4. Update Organization
- **HTTP Method**: `PUT /api/organizations/{id}`
- **Request Body**:
  ```json
  {
    "name": "Updated Team Name",
    "description": "Updated description"
  }
  ```
- **Response**: `200 OK` or `404 Not Found`

### 5. Delete Organization
- **HTTP Method**: `DELETE /api/organizations/{id}`
- **Response**: `204 No Content` or `404 Not Found`

---

## Projects Endpoints (`/api/projects`)

### 1. Get All Projects (Optional Organization Filter)
- **HTTP Method**: `GET /api/projects` or `GET /api/projects?organizationId={guid}`
- **Response**: `200 OK` `[ { "id": "guid", "name": "string", "description": "string", "organizationId": "guid", "createdAt": "iso-date", "updatedAt": "iso-date" } ]`

### 2. Get Project By ID
- **HTTP Method**: `GET /api/projects/{id}`
- **Response**: `200 OK` or `404 Not Found`

### 3. Create Project
- **HTTP Method**: `POST /api/projects`
- **Request Body**:
  ```json
  {
    "name": "Lifeboard Redesign",
    "description": "Angular and .NET migration",
    "organizationId": "guid"
  }
  ```
- **Response**: `201 Created`

### 4. Update Project
- **HTTP Method**: `PUT /api/projects/{id}`
- **Response**: `200 OK` or `404 Not Found`

### 5. Delete Project
- **HTTP Method**: `DELETE /api/projects/{id}`
- **Response**: `204 No Content` or `404 Not Found`

---

## Tasks Endpoints (`/api/tasks`)

### 1. Get All Tasks (Optional Project Filter)
- **HTTP Method**: `GET /api/tasks` or `GET /api/tasks?projectId={guid}`
- **Response**: `200 OK` `[ { "id": "guid", "title": "string", "description": "string", "completed": false, "projectId": "guid", "dueDate": "iso-date", "createdAt": "iso-date", "updatedAt": "iso-date" } ]`

### 2. Get Task By ID
- **HTTP Method**: `GET /api/tasks/{id}`
- **Response**: `200 OK` or `404 Not Found`

### 3. Create Task
- **HTTP Method**: `POST /api/tasks`
- **Request Body**:
  ```json
  {
    "title": "Write unit tests",
    "description": "Achieve 100% test coverage",
    "projectId": "guid",
    "dueDate": "2026-08-10T00:00:00Z"
  }
  ```
- **Response**: `201 Created`

### 4. Update Task (Including Completed Toggle)
- **HTTP Method**: `PUT /api/tasks/{id}`
- **Request Body**:
  ```json
  {
    "title": "Write unit tests",
    "description": "Achieve 100% test coverage",
    "completed": true,
    "projectId": "guid",
    "dueDate": "2026-08-10T00:00:00Z"
  }
  ```
- **Response**: `200 OK` or `404 Not Found`

### 5. Delete Task
- **HTTP Method**: `DELETE /api/tasks/{id}`
- **Response**: `204 No Content` or `404 Not Found`
