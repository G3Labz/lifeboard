# Lifeboard

Lifeboard is a modular dashboard-like ecosystem that aggregates several domain applications and services into a unified interface.

---

## Architectural Topology & Submodules Map

This repository operates strictly as an umbrella workspace managing multi-level **Git Submodules**.

```
Level 0: Umbrella Repository (Lifeboard)
 │
 ├── Level 1: Monolith Repository (lifeboard-multi-php)
 │
 ├── Level 1: Application Submodule (glorified-todo)
 │    ├── Level 2: Project Submodule (gtodo-fe-angular)
 │    ├── Level 2: Project Submodule (gtodo-be-net)
 │    ├── Level 2: Project Submodule (gtodo-be-ts)
 │    └── Level 2: Project Submodule (gtodo-be-angular)
 │
 ├── Level 1: Application Submodule (Finances)
 │    ├── Level 2: Project Submodule (finances-fe-angular)
 │    └── Level 2: Project Submodule (finances-multi-php)
 │
 ├── Level 1: Application Submodule (housesheet)
 │    ├── Level 2: Project Submodule (housesheet-fe-angular)
 │    └── Level 2: Project Submodule (housesheet-multi-js)
 │
 └── Level 1: Application Submodule (storeroom)
      ├── Level 2: Project Submodule (storeroom-fe-angular)
      └── Level 2: Project Submodule (storeroom-multi-js)
```

---

## Development & Submodule Guidelines

### 1. Submodule Navigation & Repository Usage
When building, modifying, or testing code within any application:
- **Always navigate directly into the child project submodule repositories** (e.g. `glorified-todo/gtodo-be-net`, `Finances/finances-app`, `housesheet/housesheet-app`, `storeroom/storeroom-app`).
- Each application root contains its own submodule references and application level documentation.

### 2. Standardized Naming Pattern
All projects follow `{projectName}-{layer}-{technology}`:
- **`projectName`**: `lifeboard`, `gtodo`, `finances`, `housesheet`, `storeroom`
- **`layer`**: `fe` (frontend), `be` (backend), `infra` (infrastructure), `multi` (hybrid/monolith)
- **`technology`**: `angular`, `net`, `ts`, `php`, `js`, `docker`

### 3. .NET Repository Structure
.NET backend repositories (e.g. `gtodo-be-net`) hold all required solution projects directly inside the repository:
- `gtodo-be-net.Application` (Web API Application entry point)
- `gtodo-be-net.Tests` (Automated unit/integration tests)

---

## Submodule Management Commands

```bash
# Clone Lifeboard with all submodules recursively
git clone --recursive https://github.com/G3Labz/Lifeboard.git

# Initialize and fetch submodules in an existing clone
git submodule update --init --recursive

# Update all submodules to latest remote commits
git submodule update --remote --recursive
```
