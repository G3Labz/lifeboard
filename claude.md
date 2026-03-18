# Lifeboard — Architecture Overview

## Modules
- **Project Management & Database** (`glorified-todo-gtodo-be-ts-domains`): 75 functions — 25 files, 0 functions

## Stats
- 25 files, 75 functions, 1 modules
- Language: typescript

## Project Management & Database module
**Location:** glorified-todo/gtodo-be-ts/src/domains/**, glorified-todo/gtodo-be-ts/src/infra/http/**, glorified-todo/gtodo-be-ts/src/**, glorified-todo/gtodo-be-ts/src/infra/models/**, glorified-todo/gtodo-be-ts/src/infra/repositories/**
**Purpose:** 25 files, 0 functions

**Entry points:**
  - `BaseModelImpl.constructor(model) [glorified-todo/gtodo-be-ts/src/infra/models/BaseModelImpl.ts:8]` — Base model impl.constructor (model)
  - `OrganizationModel.constructor(organization) [glorified-todo/gtodo-be-ts/src/infra/models/OrganizationModel.ts:8]` — Organization model.constructor (organization)
  - `ProjectModel.constructor(project) [glorified-todo/gtodo-be-ts/src/infra/models/ProjectModel.ts:9]` — Project model.constructor (project)
  - `TaskModel.constructor(task) [glorified-todo/gtodo-be-ts/src/infra/models/TaskModel.ts:11]` — Task model.constructor (task)
  - `HonoServer.constructor() [glorified-todo/gtodo-be-ts/src/infra/http/HonoServer.ts:8]` — Hono server.constructor

## Data Models & Schemas

These files define the project's data structures, schemas, and configuration.
They are auto-discovered and included verbatim from the source.

### `glorified-todo/gtodo-be-ts/src/infra/models/BaseModelImpl.ts` (model)

```typescript
import { BaseEntity } from '@domains/common/models/BaseEntity';

export class BaseModelImpl implements BaseEntity {
  id: string;
  createdAt: Date;
  updatedAt: Date;

  constructor(model: BaseEntity) {
    this.id = model.id;
    this.createdAt = model.createdAt;
    this.updatedAt = model.updatedAt;
  }
}
```

### `glorified-todo/gtodo-be-ts/src/infra/models/OrganizationModel.ts` (model)

```typescript
import { Organization } from '@domains/organization/models/Organization';
import { BaseModelImpl } from '@infra/models/BaseModelImpl';

export class OrganizationModel extends BaseModelImpl implements Organization {
  name: string;
  description?: string;

  constructor(organization: Organization) {
    super(organization);
    this.name = organization.name;
    this.description = organization.description;
  }
}
```

### `glorified-todo/gtodo-be-ts/src/infra/models/ProjectModel.ts` (model)

```typescript
import { Project } from '@domains/project/models/Project';
import { BaseModelImpl } from '@infra/models/BaseModelImpl';

export class ProjectModel extends BaseModelImpl implements Project {
  name: string;
  description?: string;
  organizationId: string;

  constructor(project: Project) {
    super(project);
    this.name = project.name;
    this.description = project.description;
    this.organizationId = project.organizationId;
  }
}
```

### `glorified-todo/gtodo-be-ts/src/infra/models/TaskModel.ts` (model)

```typescript
import { Task } from '@domains/task/models/Task';
import { BaseModelImpl } from '@infra/models/BaseModelImpl';

export class TaskModel extends BaseModelImpl implements Task {
  title: string;
  description?: string;
  completed: boolean;
  projectId: string;
  dueDate?: Date;

  constructor(task: Task) {
    super(task);
    this.title = task.title;
    this.description = task.description;
    this.completed = task.completed;
    this.projectId = task.projectId;
    this.dueDate = task.dueDate;
  }
}
```

### `glorified-todo/gtodo-be-ts/src/domains/common/models/BaseEntity.ts` (model)

```typescript
export interface BaseEntity {
  id: string;
  createdAt: Date;
  updatedAt: Date;
}
```

### `glorified-todo/gtodo-be-ts/src/domains/organization/models/Organization.ts` (model)

```typescript
import { BaseEntity } from '../../common/models/BaseEntity';

export interface Organization extends BaseEntity {
  name: string;
  description?: string;
}
```

### `glorified-todo/gtodo-be-ts/src/domains/project/models/Project.ts` (model)

```typescript
import { BaseEntity } from '../../common/models/BaseEntity';

export interface Project extends BaseEntity {
  name: string;
  description?: string;
  organizationId: string;
}
```

### `glorified-todo/gtodo-be-ts/src/domains/task/models/Task.ts` (model)

```typescript
import { BaseEntity } from '../../common/models/BaseEntity';

export interface Task extends BaseEntity {
  title: string;
  description?: string;
  completed: boolean;
  projectId: string;
  dueDate?: Date;
}
```

### `Dockerfile` (docker)

```dockerfile
FROM php:7.4-apache

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
```

### `docker-compose.yml` (docker)

```yaml
version: '3.8'

services:
  web:
    build: .
    ports:
      - "8080:80"
    volumes:
      - .:/var/www/html
```

## File Import Graph

Which files import which — useful for understanding data flow.

### Project Management & Database
- `glorified-todo/gtodo-be-ts/src/infra/http/HonoServer.ts` → `glorified-todo/gtodo-be-ts/src/infra/http/HttpServer.ts`
- `glorified-todo/gtodo-be-ts/src/domains/common/repositories/BaseRepository.ts` → `glorified-todo/gtodo-be-ts/src/domains/common/models/BaseEntity.ts`
- `glorified-todo/gtodo-be-ts/src/domains/organization/models/Organization.ts` → `glorified-todo/gtodo-be-ts/src/domains/common/models/BaseEntity.ts`
- `glorified-todo/gtodo-be-ts/src/domains/organization/repositories/OrganizationRepository.ts` → `glorified-todo/gtodo-be-ts/src/domains/common/repositories/BaseRepository.ts`, `glorified-todo/gtodo-be-ts/src/domains/organization/models/Organization.ts`
- `glorified-todo/gtodo-be-ts/src/domains/project/models/Project.ts` → `glorified-todo/gtodo-be-ts/src/domains/common/models/BaseEntity.ts`
- `glorified-todo/gtodo-be-ts/src/domains/project/repositories/ProjectRepository.ts` → `glorified-todo/gtodo-be-ts/src/domains/common/repositories/BaseRepository.ts`, `glorified-todo/gtodo-be-ts/src/domains/project/models/Project.ts`
- `glorified-todo/gtodo-be-ts/src/domains/task/models/Task.ts` → `glorified-todo/gtodo-be-ts/src/domains/common/models/BaseEntity.ts`
- `glorified-todo/gtodo-be-ts/src/domains/task/repositories/TaskRepository.ts` → `glorified-todo/gtodo-be-ts/src/domains/common/repositories/BaseRepository.ts`, `glorified-todo/gtodo-be-ts/src/domains/task/models/Task.ts`

## HTTP Routes

- **GET** `/` → `anonymous` *(glorified-todo/gtodo-be-ts/src/index.ts:25)*


