# Graph Report - Lifeboard  (2026-09-02)

## Corpus Check
- cluster-only mode — file stats not available

## Summary
- 1472 nodes · 2978 edges · 103 communities (76 shown, 13 thin omitted)
- Extraction: 95% EXTRACTED · 5% INFERRED · 0% AMBIGUOUS · INFERRED: 147 edges (avg confidence: 0.83)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `7fedbb3d`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- bootstrap.bundle.js
- TaskItem
- Project
- App
- LocalFinanceRepository
- finance.service.ts
- finances-app
- FinanceService
- housesheet-app
- bootstrap.bundle.min.js
- popper.min.js
- gtodo-app
- finances-fe-angular/src/app/app.component.ts
- BudgetBlueprintItem
- .CreateConnection
- Transaction
- NovacoopPayrollRecord
- IFinanceRepository
- GTodo.Be.Net.Models
- IStorageProvider
- Organization
- index.js
- bootstrap.js
- AppComponent
- SavingBucket
- definition.mapper.ts
- OrganizationService
- AppComponent
- development
- dispensa.js
- OrganizationsController
- SavingViewComponent
- CardsViewComponent
- TransactionsComponent
- hardware.mapper.ts
- options
- EmancipationInventoryComponent
- devDependencies
- ApComparisonComponent
- ApComparisonV2Component
- finance.mapper.spec.ts
- local-finance.repository.ts
- gtodo-be-net.Tests.csproj
- gtodo-fe-angular/package.json
- storeroom-app
- options
- finances-fe-angular/package.json
- dependencies
- dependencies
- dependencies
- DashboardComponent
- HardwareSetupComponent
- HeaderComponent
- PaymentMethodDefinition
- SetupFinancingItem
- http
- housesheet-fe-angular/package.json
- storeroom-fe-angular/package.json
- InvestmentsComponent
- housesheet.js
- zone.js
- MonitorComparisonItem
- options
- devDependencies
- devDependencies
- devDependencies
- novacoop.mapper.ts
- GuidTypeHandler
- BaseEntity
- architect
- TransactionsToolbarComponent
- finance.dto.ts
- gtodo-be-net.Application/gtodo-be-net.csproj
- tsconfig.desloppify.json
- dependencies
- @angular/common
- @angular/compiler
- @angular/core
- @angular/platform-browser
- @angular/platform-browser-dynamic
- options
- @angular/build
- @angular/cli
- @angular/compiler-cli
- karma-coverage
- karma-jasmine-html-reporter
- @types/jasmine
- TransactionDto
- apartment-links.fixture.ts

## God Nodes (most connected - your core abstractions)
1. `FinanceService` - 75 edges
2. `LocalFinanceRepository` - 56 edges
3. `IFinanceRepository` - 42 edges
4. `TaskItem` - 36 edges
5. `Project` - 33 edges
6. `Organization` - 29 edges
7. `LocalStorageProvider` - 25 edges
8. `App` - 24 edges
9. `ContributorDefinition` - 21 edges
10. `Transaction` - 21 edges

## Surprising Connections (you probably didn't know these)
- `styles` --extends--> `src/styles.css`  [EXTRACTED]
  glorified-todo/gtodo-fe-angular/angular.json → Finances/finances-fe-angular/angular.json
- `styles` --extends--> `src/styles.css`  [EXTRACTED]
  housesheet/housesheet-fe-angular/angular.json → Finances/finances-fe-angular/angular.json
- `i()` --indirect_call--> `e()`  [INFERRED]
  lifeboard-legacy/js/bootstrap.bundle.min.js → lifeboard-legacy/js/popper.min.js
- `assets` --extends--> `src/assets`  [EXTRACTED]
  housesheet/housesheet-fe-angular/angular.json → Finances/finances-fe-angular/angular.json
- `assets` --extends--> `src/favicon.ico`  [EXTRACTED]
  housesheet/housesheet-fe-angular/angular.json → Finances/finances-fe-angular/angular.json

## Import Cycles
- None detected.

## Communities (103 total, 13 thin omitted)

### Community 0 - "bootstrap.bundle.js"
Cohesion: 0.05
Nodes (67): applyStyle(), applyStyleOnLoad(), arrow(), attachToScrollParents(), Carousel(), clockwise(), computeAutoPlacement(), computeStyle() (+59 more)

### Community 1 - "TaskItem"
Cohesion: 0.08
Nodes (31): ActionResult, DateTime, Guid, HttpDelete, HttpGet, HttpPost, HttpPut, IActionResult (+23 more)

### Community 2 - "Project"
Cohesion: 0.08
Nodes (27): ControllerBase, ActionResult, Guid, HttpDelete, HttpGet, HttpPost, HttpPut, IActionResult (+19 more)

### Community 3 - "App"
Cohesion: 0.07
Nodes (14): App, appConfig, Component, computePriorityScore(), getPriorityInfo(), Importance, PriorityInfo, ProjectCategory (+6 more)

### Community 4 - "LocalFinanceRepository"
Cohesion: 0.18
Nodes (10): appConfig, routes, FINANCE_REPOSITORY, STORAGE_PROVIDER, StorageOperationError, StorageResult, LocalStorageProvider, Injectable (+2 more)

### Community 5 - "finance.service.ts"
Cohesion: 0.11
Nodes (18): calculateEmancipationGrandSummary(), calculateEmancipationProgress(), EMANCIPATION_PHASES, EmancipationGrandSummary, calculateInvestmentPortfolioSummary(), AccountDistribution, CategoryDistribution, ContextCategory (+10 more)

### Community 6 - "finances-app"
Cohesion: 0.06
Nodes (36): build, extract-i18n, serve, test, builder, configurations, defaultConfiguration, cli (+28 more)

### Community 7 - "FinanceService"
Cohesion: 0.06
Nodes (4): ApartmentComparisonItem, ApartmentComparisonV2, FinanceService, Injectable

### Community 8 - "housesheet-app"
Cohesion: 0.06
Nodes (36): build, extract-i18n, serve, test, builder, configurations, defaultConfiguration, cli (+28 more)

### Community 9 - "bootstrap.bundle.min.js"
Cohesion: 0.12
Nodes (27): At(), Bt(), Dt(), Gt(), i(), ie(), It(), jt() (+19 more)

### Community 10 - "popper.min.js"
Cohesion: 0.14
Nodes (27): i(), o(), t(), a(), b(), c(), d(), e() (+19 more)

### Community 11 - "gtodo-app"
Cohesion: 0.06
Nodes (33): build, serve, test, builder, configurations, defaultConfiguration, cli, analytics (+25 more)

### Community 12 - "finances-fe-angular/src/app/app.component.ts"
Cohesion: 0.09
Nodes (8): AppComponent, Component, ReconciliationMatrixComponent, Component, BucketDefinition, ContributorDefinition, FinanceTab, ReconciliationMatrixRow

### Community 13 - "BudgetBlueprintItem"
Cohesion: 0.10
Nodes (6): BudgetBlueprintComponent, Component, FinancialMetricSummary, sumAmounts(), sumCategoryAmounts(), BudgetBlueprintItem

### Community 14 - ".CreateConnection"
Cohesion: 0.14
Nodes (11): IDbConnection, IDbConnectionFactory, SqliteDbConnectionFactory, ProjectDapperRepository, TaskDapperRepository, Fact, IDbConnection, DapperRepositoryIntegrationTests (+3 more)

### Community 15 - "Transaction"
Cohesion: 0.16
Nodes (10): CreateTransactionPayload, TransactionFactoryDefaults, TransactionHelper, sortTransactions(), TransactionSortField, AccountType, BucketCategory, PaymentMethod (+2 more)

### Community 16 - "NovacoopPayrollRecord"
Cohesion: 0.12
Nodes (8): NovacoopPayrollComponent, Component, calculateNovacoopPayrollRecord(), NOVACOOP_FISCAL_RULES, NovacoopFiscalRuleConfig, NovacoopFiscalYear, NovacoopPayrollRecord, NovacoopSimulationInput

### Community 17 - "IFinanceRepository"
Cohesion: 0.09
Nodes (4): IFinanceRepository, CreditCard, InvestmentOperation, StorageDeviceItem

### Community 18 - "GTodo.Be.Net.Models"
Cohesion: 0.19
Nodes (7): GTodo.Be.Net.Services, GTodo.Be.Net.Data, GTodo.Be.Net.Repositories, GTodo.Be.Net.Tests, GTodo.Be.Net.Models, GTodo.Be.Net.Controllers, DbInitializer

### Community 19 - "IStorageProvider"
Cohesion: 0.13
Nodes (5): IStorageProvider, GenericEntityStore, FakeStorageProvider, MockDomain, MockDto

### Community 20 - "Organization"
Cohesion: 0.20
Nodes (8): Organization, Description, Name, Guid, IEnumerable, IOrganizationRepository, OrganizationDapperRepository, Guid

### Community 21 - "index.js"
Cohesion: 0.17
Nodes (18): alertOnEmptyField(), cleanFormValues(), getInputDataFromQuickAdd(), getTotalBalance(), isEmptyRequiredFields(), onClickDeleteButtonHandler(), onClickEditButtonHandler(), onClickQuickAddButtonHandler() (+10 more)

### Community 22 - "bootstrap.js"
Cohesion: 0.11
Nodes (7): _createClass(), _defineProperties(), _defineProperty(), getSpecialTransitionEndEvent(), _objectSpread(), TODO: Remove in v5, setTransitionEndSupport()

### Community 23 - "AppComponent"
Cohesion: 0.15
Nodes (6): AppComponent, BuyItem, HaveItem, Component, appConfig, routes

### Community 24 - "SavingBucket"
Cohesion: 0.14
Nodes (7): BudgetBlueprintDto, CreditCardDto, SavingBucketDto, BudgetBlueprintMapper, CreditCardMapper, SavingBucketMapper, SavingBucket

### Community 25 - "definition.mapper.ts"
Cohesion: 0.15
Nodes (7): AccountTypeDto, BucketDefinitionDto, ContributorDto, AccountTypeMapper, BucketDefinitionMapper, ContributorMapper, AccountTypeDefinition

### Community 26 - "OrganizationService"
Cohesion: 0.20
Nodes (6): IEnumerable, IOrganizationService, OrganizationService, Fact, Mock, OrganizationServiceTests

### Community 27 - "AppComponent"
Cohesion: 0.18
Nodes (5): Activity, AppComponent, Component, appConfig, routes

### Community 28 - "development"
Cohesion: 0.12
Nodes (17): build, serve, builder, configurations, defaultConfiguration, development, production, buildTarget (+9 more)

### Community 29 - "dispensa.js"
Cohesion: 0.35
Nodes (16): cadastraProdutoBuy(), cadastraProdutoHave(), clearAllBuy(), clearAllHave(), clearBuyInputs(), clearHaveInputs(), deleteItemBuy(), deleteItemHave() (+8 more)

### Community 30 - "OrganizationsController"
Cohesion: 0.17
Nodes (11): ActionResult, Guid, HttpDelete, HttpGet, HttpPost, HttpPut, IActionResult, IEnumerable (+3 more)

### Community 34 - "hardware.mapper.ts"
Cohesion: 0.23
Nodes (6): MonitorComparisonDto, SetupFinancingItemDto, StorageDeviceDto, MonitorComparisonMapper, SetupFinancingMapper, StorageDeviceMapper

### Community 35 - "options"
Cohesion: 0.23
Nodes (12): options, src/assets, src/favicon.ico, assets, browser, index, outputPath, scripts (+4 more)

### Community 37 - "devDependencies"
Cohesion: 0.18
Nodes (11): typescript, typescript, devDependencies, @angular/build, @angular/cli, @angular/compiler-cli, prettier, typescript (+3 more)

### Community 40 - "finance.mapper.spec.ts"
Cohesion: 0.33
Nodes (4): ApartmentComparisonV2Dto, ApartmentDto, ApartmentMapper, ApartmentV2Mapper

### Community 41 - "local-finance.repository.ts"
Cohesion: 0.31
Nodes (5): InvestmentAssetDto, InvestmentLogDto, InvestmentAssetMapper, InvestmentLogMapper, STORAGE_KEYS

### Community 42 - "gtodo-be-net.Tests.csproj"
Cohesion: 0.18
Nodes (9): net9.0, Dapper (2.1.35), Microsoft.Data.Sqlite (9.0.2), coverlet.collector (6.0.2), Microsoft.NET.Test.Sdk (17.12.0), Moq (4.20.72), xunit (2.9.2), xunit.runner.visualstudio (3.0.0) (+1 more)

### Community 43 - "gtodo-fe-angular/package.json"
Cohesion: 0.18
Nodes (10): name, packageManager, private, scripts, build, ng, start, test (+2 more)

### Community 44 - "storeroom-app"
Cohesion: 0.18
Nodes (10): newProjectRoot, projects, storeroom-app, $schema, prefix, projectType, root, schematics (+2 more)

### Community 45 - "options"
Cohesion: 0.24
Nodes (10): src/styles.css, styles, options, browser, index, outputPath, scripts, styles (+2 more)

### Community 46 - "finances-fe-angular/package.json"
Cohesion: 0.20
Nodes (9): name, private, scripts, build, ng, start, test, watch (+1 more)

### Community 47 - "dependencies"
Cohesion: 0.20
Nodes (10): dependencies, @angular/animations, rxjs, tslib, @angular/animations, rxjs, tslib, @angular/animations (+2 more)

### Community 48 - "dependencies"
Cohesion: 0.20
Nodes (10): @angular/forms, @angular/forms, @angular/forms, dependencies, @angular/forms, rxjs, tslib, rxjs (+2 more)

### Community 49 - "dependencies"
Cohesion: 0.20
Nodes (10): @angular/router, @angular/router, dependencies, @angular/router, rxjs, tslib, rxjs, tslib (+2 more)

### Community 51 - "HardwareSetupComponent"
Cohesion: 0.20
Nodes (3): HardwareSetupComponent, maxSafe(), Component

### Community 53 - "PaymentMethodDefinition"
Cohesion: 0.24
Nodes (3): PaymentMethodDto, PaymentMethodMapper, PaymentMethodDefinition

### Community 54 - "SetupFinancingItem"
Cohesion: 0.24
Nodes (3): calculateSetupFinancingSummary(), SetupFinancingSummary, SetupFinancingItem

### Community 55 - "http"
Cohesion: 0.20
Nodes (9): ASPNETCORE_ENVIRONMENT, applicationUrl, commandName, dotnetRunMessages, environmentVariables, launchBrowser, profiles, http (+1 more)

### Community 56 - "housesheet-fe-angular/package.json"
Cohesion: 0.20
Nodes (9): name, private, scripts, build, ng, start, test, watch (+1 more)

### Community 57 - "storeroom-fe-angular/package.json"
Cohesion: 0.20
Nodes (9): name, private, scripts, build, ng, start, test, watch (+1 more)

### Community 59 - "housesheet.js"
Cohesion: 0.58
Nodes (8): addActivity(), clearAllActivities(), deleteActivity(), escapeHtml(), getActivities(), renderActivities(), setActivities(), toggleStatus()

### Community 60 - "zone.js"
Cohesion: 0.32
Nodes (8): zone.js/testing, polyfills, zone.js, zone.js, zone.js, polyfills, zone.js, polyfills

### Community 62 - "options"
Cohesion: 0.32
Nodes (8): options, browser, index, outputPath, scripts, styles, tsConfig, options

### Community 63 - "devDependencies"
Cohesion: 0.29
Nodes (7): devDependencies, karma, karma-jasmine, karma, karma-jasmine, karma-jasmine, karma-jasmine

### Community 64 - "devDependencies"
Cohesion: 0.29
Nodes (7): jasmine-core, jasmine-core, devDependencies, jasmine-core, karma, karma, jasmine-core

### Community 65 - "devDependencies"
Cohesion: 0.29
Nodes (7): karma-chrome-launcher, karma-chrome-launcher, karma-chrome-launcher, devDependencies, karma, karma-chrome-launcher, karma

### Community 66 - "novacoop.mapper.ts"
Cohesion: 0.43
Nodes (4): NovacoopPayrollDto, isNovacoopFiscalYear(), NovacoopMapper, VALID_FISCAL_YEARS

### Community 67 - "GuidTypeHandler"
Cohesion: 0.33
Nodes (4): Guid, GuidTypeHandler, IDbDataParameter, TypeHandler

### Community 68 - "BaseEntity"
Cohesion: 0.29
Nodes (6): DateTime, Guid, BaseEntity, CreatedAt, Id, UpdatedAt

### Community 69 - "architect"
Cohesion: 0.29
Nodes (7): extract-i18n, test, builder, options, buildTarget, architect, builder

### Community 70 - "TransactionsToolbarComponent"
Cohesion: 0.40
Nodes (4): TransactionsToolbarComponent, Component, Input, Output

### Community 72 - "gtodo-be-net.Application/gtodo-be-net.csproj"
Cohesion: 0.33
Nodes (5): net10.0, Dapper (2.1.35), Microsoft.Data.Sqlite (9.0.2), Microsoft.AspNetCore.OpenApi (9.0.11), Microsoft.NET.Sdk.Web

### Community 74 - "tsconfig.desloppify.json"
Cohesion: 0.33
Nodes (5): ./tsconfig.app.json, compilerOptions, noUnusedLocals, noUnusedParameters, extends

### Community 75 - "dependencies"
Cohesion: 0.33
Nodes (6): dependencies, rxjs, tslib, zone.js, rxjs, tslib

### Community 76 - "@angular/common"
Cohesion: 0.40
Nodes (5): @angular/common, @angular/common, @angular/common, @angular/common, @angular/common

### Community 77 - "@angular/compiler"
Cohesion: 0.40
Nodes (5): @angular/compiler, @angular/compiler, @angular/compiler, @angular/compiler, @angular/compiler

### Community 78 - "@angular/core"
Cohesion: 0.40
Nodes (5): @angular/core, @angular/core, @angular/core, @angular/core, @angular/core

### Community 79 - "@angular/platform-browser"
Cohesion: 0.40
Nodes (5): @angular/platform-browser, @angular/platform-browser, @angular/platform-browser, @angular/platform-browser, @angular/platform-browser

### Community 80 - "@angular/platform-browser-dynamic"
Cohesion: 0.40
Nodes (5): @angular/platform-browser-dynamic, @angular/platform-browser-dynamic, @angular/platform-browser-dynamic, @angular/platform-browser-dynamic, @angular/platform-browser-dynamic

### Community 82 - "options"
Cohesion: 0.40
Nodes (5): options, assets, browser, styles, tsConfig

### Community 83 - "@angular/build"
Cohesion: 0.50
Nodes (4): @angular/build, @angular/build, @angular/build, @angular/build

### Community 84 - "@angular/cli"
Cohesion: 0.50
Nodes (4): @angular/cli, @angular/cli, @angular/cli, @angular/cli

### Community 85 - "@angular/compiler-cli"
Cohesion: 0.50
Nodes (4): @angular/compiler-cli, @angular/compiler-cli, @angular/compiler-cli, @angular/compiler-cli

### Community 86 - "karma-coverage"
Cohesion: 0.50
Nodes (4): karma-coverage, karma-coverage, karma-coverage, karma-coverage

### Community 87 - "karma-jasmine-html-reporter"
Cohesion: 0.50
Nodes (4): karma-jasmine-html-reporter, karma-jasmine-html-reporter, karma-jasmine-html-reporter, karma-jasmine-html-reporter

### Community 88 - "@types/jasmine"
Cohesion: 0.50
Nodes (4): @types/jasmine, @types/jasmine, @types/jasmine, @types/jasmine

## Knowledge Gaps
- **199 isolated node(s):** `FinancialMetricSummary`, `MockDomain`, `MockDto`, `BuyItem`, `HaveItem` (+194 more)
  These have ≤1 connection - possible missing edges or undocumented components. (Counts symbols only; 426 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **13 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `zone.js` connect `zone.js` to `dependencies`?**
  _High betweenness centrality (0.026) - this node is a cross-community bridge._
- **Why does `FinanceService` connect `FinanceService` to `LocalFinanceRepository`, `finance.service.ts`, `finances-fe-angular/src/app/app.component.ts`, `BudgetBlueprintItem`, `Transaction`, `NovacoopPayrollRecord`, `IFinanceRepository`, `SetupFinancingItem`, `SavingBucket`, `MonitorComparisonItem`?**
  _High betweenness centrality (0.018) - this node is a cross-community bridge._
- **Why does `dependencies` connect `dependencies` to `@angular/common`, `@angular/compiler`, `@angular/core`, `dependencies`, `dependencies`, `@angular/platform-browser`, `@angular/platform-browser-dynamic`, `dependencies`, `storeroom-fe-angular/package.json`?**
  _High betweenness centrality (0.014) - this node is a cross-community bridge._
- **What connects `FinancialMetricSummary`, `MockDomain`, `MockDto` to the rest of the system?**
  _199 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `bootstrap.bundle.js` be split into smaller, more focused modules?**
  _Cohesion score 0.05249569707401033 - nodes in this community are weakly interconnected._
- **Should `TaskItem` be split into smaller, more focused modules?**
  _Cohesion score 0.0771478667445938 - nodes in this community are weakly interconnected._
- **Should `Project` be split into smaller, more focused modules?**
  _Cohesion score 0.08145363408521303 - nodes in this community are weakly interconnected._