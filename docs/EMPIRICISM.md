# Empiricism Log

## [2026-08-05] Angular Frontend Migration & .NET 9 Web API Backend Creation

### 1. `Finances` (Angular Frontend)
- **Architecture**: Created Angular Standalone application [`finances-app`](file:///home/g3/Repos/g3labz/Lifeboard/Finances/finances-app).
- **Features**: State management using Angular Signals (`signal`, `computed`), currency pipe formatting (`BRL`), dynamic greeting, emoji feedback (`🚀` / `👎`), and `localStorage` persistence.
- **Verification**: Angular build verified clean (`ng build` exit code 0).

### 2. `storeroom` (Angular Frontend)
- **Architecture**: Created Angular Standalone application [`storeroom-app`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-app).
- **Features**: Dual inventory (`Have`) and shopping list (`Buy`) tracking, `markAsBought()` migration, item deletion, clear-all, and `localStorage` persistence.
- **Verification**: Angular build verified clean (`ng build` exit code 0).

### 3. `housesheet` (Angular Frontend)
- **Architecture**: Created Angular Standalone application [`housesheet-app`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-app).
- **Features**: Household activity logging with category badges, status toggling (`Pending ⏳` / `Completed ✅`), entry deletion, log clearing, and `localStorage` persistence.
- **Verification**: Angular build verified clean (`ng build` exit code 0).

### 4. `glorified-todo` (.NET 9 Web API Backend & Dapper ORM)
- **Architecture**: Created .NET 9 Web API project [`gtodo-be-net`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net).
- **ORM & DI Implementation**:
  - Integrated `Dapper` (`v2.1.35`) and `Microsoft.Data.Sqlite` (`v9.0.2`).
  - Added [`Data/DbConnectionFactory.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Data/DbConnectionFactory.cs) (`IDbConnectionFactory`) for managing SQLite connections.
  - Added [`Data/DbInitializer.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Data/DbInitializer.cs) for automatic table creation on startup.
  - Implemented Dapper repositories: [`OrganizationDapperRepository.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Repositories/OrganizationDapperRepository.cs), [`ProjectDapperRepository.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Repositories/ProjectDapperRepository.cs), and [`TaskDapperRepository.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Repositories/TaskDapperRepository.cs).
  - Injected Dapper repositories into domain services ([`OrganizationService`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Services/OrganizationService.cs), [`ProjectService`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Services/ProjectService.cs), [`TaskService`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Services/TaskService.cs)) via constructor Dependency Injection.
  - Registered all interfaces and implementations in [`Program.cs`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net/Program.cs) using Scoped / Singleton lifetimes.
- **Verification**: `.NET` build verified clean (`dotnet build` exit code 0, 0 Warnings, 0 Errors).
