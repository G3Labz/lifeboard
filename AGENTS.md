# Lifeboard — Agent Architecture Guidelines

## Core Directives for Development Agents
1. **Submodule Repository Directives**: Lifeboard is a multi-level submoduled repository. Agents MUST navigate directly into the target child submodule repository (e.g. `glorified-todo/gtodo-be-net`, `Finances/finances-fe-angular`, `housesheet/housesheet-fe-angular`, `storeroom/storeroom-fe-angular`) when reading, modifying, building, or testing code.
2. **.NET Project Layout**: .NET backend repositories (e.g. `gtodo-be-net`) hold all required solution projects directly inside the repository root (`gtodo-be-net.Application`, `gtodo-be-net.Tests`).
3. **Automated Commit & Push Policy (`dev-agy`)**:
   - When operating on branch `dev-agy` (or `dev/agy`), agents are authorized and required to commit and push changes.
   - Commit after every iteration.
   - Bump the project version upon each iteration. For projects containing a `package.json`, increment the patch version following `X.Y.Z` semantics (e.g., `npm version patch` or updating the `z` value).
4. **Testing & Verification Directives**:
   - Tests are mandatory to ensure code correctness.
   - **Backend Applications (.NET, Node, Go)**: Strictly follow Test-Driven Development (TDD) — write test cases before implementation and verify.
   - **Frontend Applications**: Create and execute corresponding tests after each iteration.

---

## Architectural Overview & Topology
Lifeboard is an umbrella workspace (`Lifeboard`) managing nested submodules and multi-layer domain applications.

### Naming Taxonomy
All projects follow `{projectName}-{layer}-{technology}` and legacy projects follow `{projectName}-legacy`:
- **`projectName`**: `lifeboard`, `gtodo`, `finances`, `housesheet`, `storeroom`
- **`layer`**: `fe` (frontend), `be` (backend), `infra` (infrastructure), `legacy` (legacy monolith/web)
- **`technology`**: `angular`, `net`, `ts`, `php`, `js`, `docker`

### Technology Stack Policy
- **.NET**: **.NET 10.0 LTS** baseline
- **Angular**: **v22** (with TypeScript 7)
- **TypeScript**: **TS 7.x**
- **PHP**: 8.2+ LTS

---

## Modules Taxonomy & Submodules Map

- **Umbrella Workspace**: `Lifeboard`
  - `lifeboard-legacy` ([`lifeboard-legacy`](file:///home/g3/Repos/g3labz/Lifeboard/lifeboard-legacy)): Legacy PHP Dashboard Monolith (`index.php`, `cabecalho.php`, `footer.php`, `conecta.php`)
  - Target Roadmap: `lifeboard-fe-angular`, `lifeboard-be-net`
- **Application Submodule**: [`glorified-todo`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo)
  - `gtodo-fe-angular` ([`gtodo-fe-angular`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-fe-angular)): Angular v22 Standalone SPA
  - `gtodo-be-net` ([`gtodo-be-net`](file:///home/g3/Repos/g3labz/Lifeboard/glorified-todo/gtodo-be-net)): .NET 10 Web API + Dapper ORM + SQLite (`gtodo-be-net.Application`, `gtodo-be-net.Tests`)
- **Application Submodule**: [`Finances`](file:///home/g3/Repos/g3labz/Lifeboard/Finances)
  - `finances-fe-angular` ([`finances-fe-angular`](file:///home/g3/Repos/g3labz/Lifeboard/Finances/finances-fe-angular)): Angular v22 Standalone SPA
  - `finances-legacy` ([`finances-legacy`](file:///home/g3/Repos/g3labz/Lifeboard/Finances/finances-legacy)): Legacy Web Application
- **Application Submodule**: [`housesheet`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet)
  - `housesheet-fe-angular` ([`housesheet-fe-angular`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-fe-angular)): Angular v22 Standalone SPA
  - `housesheet-legacy` ([`housesheet-legacy`](file:///home/g3/Repos/g3labz/Lifeboard/housesheet/housesheet-legacy)): Legacy Vanilla HTML/JS App
- **Application Submodule**: [`storeroom`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom)
  - `storeroom-fe-angular` ([`storeroom-fe-angular`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-fe-angular)): Angular v22 Standalone SPA
  - `storeroom-legacy` ([`storeroom-legacy`](file:///home/g3/Repos/g3labz/Lifeboard/storeroom/storeroom-legacy)): Legacy Vanilla HTML/JS App

<!-- MIKK-START -->

<repository_context>
  <name>Lifeboard</name>
  <stats>
    <files>57</files>
    <functions>481</functions>
    <modules>0</modules>
    <language>typescript</language>
  </stats>
</repository_context>

<modules>
</modules>

## Data Models & Schemas

These files define the project's data structures, schemas, and configuration.
They are auto-discovered and included verbatim from the source.

### `lifeboard-legacy/Dockerfile` (docker)

```lifeboard-legacy/Dockerfile
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

### `lifeboard-legacy/docker-compose.yml` (config)

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

### `Finances/finances-fe-angular/angular.json` (config)

```json
{
  "$schema": "./node_modules/@angular/cli/lib/config/schema.json",
  "version": 1,
  "newProjectRoot": "projects",
  "projects": {
    "finances-app": {
      "projectType": "application",
      "schematics": {},
      "root": "",
      "sourceRoot": "src",
      "prefix": "app",
      "architect": {
        "build": {
          "builder": "@angular-devkit/build-angular:application",
          "options": {
            "outputPath": "dist/finances-app",
            "index": "src/index.html",
            "browser": "src/main.ts",
            "polyfills": [
              "zone.js"
            ],
            "tsConfig": "tsconfig.app.json",
            "assets": [
              "src/favicon.ico",
              "src/assets"
            ],
            "styles": [
              "src/styles.css"
            ],
            "scripts": []
          },
          "configurations": {
            "production": {
              "budgets": [
                {
                  "type": "initial",
                  "maximumWarning": "2mb",
                  "maximumError": "5mb"
                },
                {
                  "type": "anyComponentStyle",
                  "maximumWarning": "10kb",
                  "maximumError": "20kb"
                }

              ],
              "outputHashing": "all"
            },
            "development": {
              "optimization": false,
              "extractLicenses": false,
              "sourceMap": true
            }
          },
          "defaultConfiguration": "production"
        },
        "serve": {
          "builder": "@angular-devkit/build-angular:dev-server",
          "configurations": {
            "production": {
              "buildTarget": "finances-app:build:production"
            },
            "development": {
              "buildTarget": "finances-app:build:development"
            }
          },
          "defaultConfiguration": "development"
        },
        "extract-i18n": {
          "builder": "@angular-devkit/build-angular:extract-i18n",
          "options": {
            "buildTarget": "finances-app:build"
          }
        },
        "test": {
          "builder": "@angular-devkit/build-angular:karma",
          "options": {
            "polyfills": [
              "zone.js",
              "zone.js/testing"
            ],
            "tsConfig": "tsconfig.spec.json",
            "assets": [
              "src/favicon.ico",
              "src/assets"
            ],
            "styles": [
              "src/styles.css"
            ],
            "scripts": []
          }
        }
      }
    }
  },
  "cli": {
    "analytics": false
  }
}
```

### `Finances/finances-fe-angular/package.json` (package-config)

```json
{
  "name": "finances-fe-angular",
  "version": "0.3.0",
  "scripts": {

    "ng": "ng",
    "start": "ng serve",
    "build": "ng build",
    "watch": "ng build --watch --configuration development",
    "test": "ng test"
  },
  "private": true,
  "dependencies": {
    "@angular/animations": "^22.0.0",
    "@angular/common": "^22.0.0",
    "@angular/compiler": "^22.0.0",
    "@angular/core": "^22.0.0",
    "@angular/forms": "^22.0.0",
    "@angular/platform-browser": "^22.0.0",
    "@angular/platform-browser-dynamic": "^22.0.0",
    "@angular/router": "^22.0.0",
    "rxjs": "~7.8.0",
    "tslib": "^2.6.0",
    "zone.js": "~0.15.0"
  },
  "devDependencies": {
    "@angular/build": "^22.0.0",
    "@angular/cli": "^22.0.0",
    "@angular/compiler-cli": "^22.0.0",
    "@types/jasmine": "~5.1.0",
    "jasmine-core": "~5.1.0",
    "karma": "~6.4.0",
    "karma-chrome-launcher": "~3.2.0",
    "karma-coverage": "~2.2.0",
    "karma-jasmine": "~5.1.0",
    "karma-jasmine-html-reporter": "~2.1.0",
    "typescript": "~7.0.0"
  }
}
```

### `Finances/finances-fe-angular/tsconfig.app.json` (tsconfig)

```json
/* To learn more about this file see: https://angular.io/config/tsconfig. */
{
  "extends": "./tsconfig.json",
  "compilerOptions": {
    "outDir": "./out-tsc/app",
    "types": []
  },
  "files": [
    "src/main.ts"
  ],
  "include": [
    "src/**/*.d.ts"
  ]
}
```

### `Finances/finances-fe-angular/tsconfig.json` (tsconfig)

```json
/* To learn more about this file see: https://angular.io/config/tsconfig. */
{
  "compileOnSave": false,
  "compilerOptions": {
    "outDir": "./dist/out-tsc",
    "strict": true,
    "noImplicitOverride": true,
    "noPropertyAccessFromIndexSignature": true,
    "noImplicitReturns": true,
    "noFallthroughCasesInSwitch": true,
    "skipLibCheck": true,
    "esModuleInterop": true,
    "sourceMap": true,
    "declaration": false,
    "experimentalDecorators": true,
    "moduleResolution": "node",
    "importHelpers": true,
    "target": "ES2022",
    "module": "ES2022",
    "useDefineForClassFields": false,
    "lib": [
      "ES2022",
      "dom"
    ]
  },
  "angularCompilerOptions": {
    "enableI18nLegacyMessageIdFormat": false,
    "strictInjectionParameters": true,
    "strictInputAccessModifiers": true,
    "strictTemplates": true
  }
}
```

### `Finances/finances-fe-angular/tsconfig.spec.json` (tsconfig)

```json
/* To learn more about this file see: https://angular.io/config/tsconfig. */
{
  "extends": "./tsconfig.json",
  "compilerOptions": {
    "outDir": "./out-tsc/spec",
    "types": [
      "jasmine"
    ]
  },
  "include": [
    "src/**/*.spec.ts",
    "src/**/*.d.ts"
  ]
}
```

### `glorified-todo/gtodo-fe-angular/.prettierrc` (format-config)

```prettierrc
{
  "printWidth": 100,
  "singleQuote": true,
  "overrides": [
    {
      "files": "*.html",
      "options": {
        "parser": "angular"
      }
    }
  ]
}
```

### `glorified-todo/gtodo-fe-angular/angular.json` (config)

```json
{
  "$schema": "./node_modules/@angular/cli/lib/config/schema.json",
  "version": 1,
  "cli": {
    "packageManager": "npm"
  },
  "newProjectRoot": "projects",
  "projects": {
    "gtodo-app": {
      "projectType": "application",
      "schematics": {},
      "root": "",
      "sourceRoot": "src",
      "prefix": "app",
      "architect": {
        "build": {
          "builder": "@angular/build:application",
          "options": {
            "browser": "src/main.ts",
            "tsConfig": "tsconfig.app.json",
            "assets": [
              {
                "glob": "**/*",
                "input": "public"
              }
            ],
            "styles": [
              "src/styles.css"
            ]
          },
          "configurations": {
            "production": {
              "budgets": [
                {
                  "type": "initial",
                  "maximumWarning": "500kB",
                  "maximumError": "1MB"
                },
                {
                  "type": "anyComponentStyle",
                  "maximumWarning": "4kB",
                  "maximumError": "8kB"
                }
              ],
              "outputHashing": "all"
            },
            "development": {
              "optimization": false,
              "extractLicenses": false,
              "sourceMap": true
            }
          },
          "defaultConfiguration": "production"
        },
        "serve": {
          "builder": "@angular/build:dev-server",
          "configurations": {
            "production": {
              "buildTarget": "gtodo-app:build:production"
            },
            "development": {
              "buildTarget": "gtodo-app:build:development"
            }
          },
          "defaultConfiguration": "development"
        },
        "test": {
          "builder": "@angular/build:unit-test"
        }
      }
    }
  }
}
```

### `glorified-todo/gtodo-fe-angular/package.json` (package-config)

```json
{
  "name": "gtodo-fe-angular",
  "version": "0.0.0",
  "scripts": {
    "ng": "ng",
    "start": "ng serve",
    "build": "ng build",
    "watch": "ng build --watch --configuration development",
    "test": "ng test"
  },
  "private": true,
  "packageManager": "npm@10.8.2",
  "dependencies": {
    "@angular/animations": "^22.0.0",
    "@angular/common": "^22.0.0",
    "@angular/compiler": "^22.0.0",
    "@angular/core": "^22.0.0",
    "@angular/forms": "^22.0.0",
    "@angular/platform-browser": "^22.0.0",
    "@angular/platform-browser-dynamic": "^22.0.0",
    "@angular/router": "^22.0.0",
    "rxjs": "~7.8.0",
    "tslib": "^2.6.0",
    "zone.js": "~0.15.0"
  },
  "devDependencies": {
    "@angular/build": "^22.0.0",
    "@angular/cli": "^22.0.0",
    "@angular/compiler-cli": "^22.0.0",
    "prettier": "^3.8.1",
    "typescript": "~7.0.0"
  }
}
```

### `glorified-todo/gtodo-fe-angular/tsconfig.app.json` (tsconfig)

```json
/* To learn more about Typescript configuration file: https://www.typescriptlang.org/docs/handbook/tsconfig-json.html. */
/* To learn more about Angular compiler options: https://angular.dev/reference/configs/angular-compiler-options. */
{
  "extends": "./tsconfig.json",
  "compilerOptions": {
    "outDir": "./out-tsc/app",
    "types": []
  },
  "include": [
    "src/**/*.ts"
  ],
  "exclude": [
    "src/**/*.spec.ts"
  ]
}
```

### `glorified-todo/gtodo-fe-angular/tsconfig.json` (tsconfig)

```json
/* To learn more about Typescript configuration file: https://www.typescriptlang.org/docs/handbook/tsconfig-json.html. */
/* To learn more about Angular compiler options: https://angular.dev/reference/configs/angular-compiler-options. */
{
  "compileOnSave": false,
  "compilerOptions": {
    "strict": true,
    "noImplicitOverride": true,
    "noPropertyAccessFromIndexSignature": true,
    "noImplicitReturns": true,
    "noFallthroughCasesInSwitch": true,
    "skipLibCheck": true,
    "isolatedModules": true,
    "experimentalDecorators": true,
    "importHelpers": true,
    "target": "ES2022",
    "module": "preserve"
  },
  "angularCompilerOptions": {
    "enableI18nLegacyMessageIdFormat": false,
    "strictInjectionParameters": true,
    "strictInputAccessModifiers": true,
    "strictTemplates": true
  },
  "files": [],
  "references": [
    {
      "path": "./tsconfig.app.json"
    },
    {
      "path": "./tsconfig.spec.json"
    }
  ]
}
```

### `glorified-todo/gtodo-fe-angular/tsconfig.spec.json` (tsconfig)

```json
/* To learn more about Typescript configuration file: https://www.typescriptlang.org/docs/handbook/tsconfig-json.html. */
/* To learn more about Angular compiler options: https://angular.dev/reference/configs/angular-compiler-options. */
{
  "extends": "./tsconfig.json",
  "compilerOptions": {
    "outDir": "./out-tsc/spec",
    "types": [
      "vitest/globals"
    ]
  },
  "include": [
    "src/**/*.d.ts",
    "src/**/*.spec.ts"
  ]
}
```

### `housesheet/housesheet-fe-angular/angular.json` (config)

```json
{
  "$schema": "./node_modules/@angular/cli/lib/config/schema.json",
  "version": 1,
  "newProjectRoot": "projects",
  "projects": {
    "housesheet-app": {
      "projectType": "application",
      "schematics": {},
      "root": "",
      "sourceRoot": "src",
      "prefix": "app",
      "architect": {
        "build": {
          "builder": "@angular-devkit/build-angular:application",
          "options": {
            "outputPath": "dist/housesheet-app",
            "index": "src/index.html",
            "browser": "src/main.ts",
            "polyfills": [
              "zone.js"
            ],
            "tsConfig": "tsconfig.app.json",
            "assets": [
              "src/favicon.ico",
              "src/assets"
            ],
            "styles": [
              "src/styles.css"
            ],
            "scripts": []
          },
          "configurations": {
            "production": {
              "budgets": [
                {
                  "type": "initial",
                  "maximumWarning": "500kb",
                  "maximumError": "1mb"
                },
                {
                  "type": "anyComponentStyle",
                  "maximumWarning": "2kb",
                  "maximumError": "4kb"
                }
              ],
              "outputHashing": "all"
            },
            "development": {
              "optimization": false,
              "extractLicenses": false,
              "sourceMap": true
            }
          },
          "defaultConfiguration": "production"
        },
        "serve": {
          "builder": "@angular-devkit/build-angular:dev-server",
          "configurations": {
            "production": {
              "buildTarget": "housesheet-app:build:production"
            },
            "development": {
              "buildTarget": "housesheet-app:build:development"
            }
          },
          "defaultConfiguration": "development"
        },
        "extract-i18n": {
          "builder": "@angular-devkit/build-angular:extract-i18n",
          "options": {
            "buildTarget": "housesheet-app:build"
          }
        },
        "test": {
          "builder": "@angular-devkit/build-angular:karma",
          "options": {
            "polyfills": [
              "zone.js",
              "zone.js/testing"
            ],
            "tsConfig": "tsconfig.spec.json",
            "assets": [
              "src/favicon.ico",
              "src/assets"
            ],
            "styles": [
              "src/styles.css"
            ],
            "scripts": []
          }
        }
      }
    }
  }
}
```

### `housesheet/housesheet-fe-angular/package.json` (package-config)

```json
{
  "name": "housesheet-fe-angular",
  "version": "0.0.0",
  "scripts": {
    "ng": "ng",
    "start": "ng serve",
    "build": "ng build",
    "watch": "ng build --watch --configuration development",
    "test": "ng test"
  },
  "private": true,
  "dependencies": {
    "@angular/animations": "^22.0.0",
    "@angular/common": "^22.0.0",
    "@angular/compiler": "^22.0.0",
    "@angular/core": "^22.0.0",
    "@angular/forms": "^22.0.0",
    "@angular/platform-browser": "^22.0.0",
    "@angular/platform-browser-dynamic": "^22.0.0",
    "@angular/router": "^22.0.0",
    "rxjs": "~7.8.0",
    "tslib": "^2.6.0",
    "zone.js": "~0.15.0"
  },
  "devDependencies": {
    "@angular/build": "^22.0.0",
    "@angular/cli": "^22.0.0",
    "@angular/compiler-cli": "^22.0.0",
    "@types/jasmine": "~5.1.0",
    "jasmine-core": "~5.1.0",
    "karma": "~6.4.0",
    "karma-chrome-launcher": "~3.2.0",
    "karma-coverage": "~2.2.0",
    "karma-jasmine": "~5.1.0",
    "karma-jasmine-html-reporter": "~2.1.0",
    "typescript": "~7.0.0"
  }
}
```

### `housesheet/housesheet-fe-angular/tsconfig.app.json` (tsconfig)

```json
/* To learn more about this file see: https://angular.io/config/tsconfig. */
{
  "extends": "./tsconfig.json",
  "compilerOptions": {
    "outDir": "./out-tsc/app",
    "types": []
  },
  "files": [
    "src/main.ts"
  ],
  "include": [
    "src/**/*.d.ts"
  ]
}
```

### `housesheet/housesheet-fe-angular/tsconfig.json` (tsconfig)

```json
/* To learn more about this file see: https://angular.io/config/tsconfig. */
{
  "compileOnSave": false,
  "compilerOptions": {
    "outDir": "./dist/out-tsc",
    "strict": true,
    "noImplicitOverride": true,
    "noPropertyAccessFromIndexSignature": true,
    "noImplicitReturns": true,
    "noFallthroughCasesInSwitch": true,
    "skipLibCheck": true,
    "esModuleInterop": true,
    "sourceMap": true,
    "declaration": false,
    "experimentalDecorators": true,
    "moduleResolution": "node",
    "importHelpers": true,
    "target": "ES2022",
    "module": "ES2022",
    "useDefineForClassFields": false,
    "lib": [
      "ES2022",
      "dom"
    ]
  },
  "angularCompilerOptions": {
    "enableI18nLegacyMessageIdFormat": false,
    "strictInjectionParameters": true,
    "strictInputAccessModifiers": true,
    "strictTemplates": true
  }
}
```

### `housesheet/housesheet-fe-angular/tsconfig.spec.json` (tsconfig)

```json
/* To learn more about this file see: https://angular.io/config/tsconfig. */
{
  "extends": "./tsconfig.json",
  "compilerOptions": {
    "outDir": "./out-tsc/spec",
    "types": [
      "jasmine"
    ]
  },
  "include": [
    "src/**/*.spec.ts",
    "src/**/*.d.ts"
  ]
}
```

### `storeroom/storeroom-fe-angular/angular.json` (config)

```json
{
  "$schema": "./node_modules/@angular/cli/lib/config/schema.json",
  "version": 1,
  "newProjectRoot": "projects",
  "projects": {
    "storeroom-app": {
      "projectType": "application",
      "schematics": {},
      "root": "",
      "sourceRoot": "src",
      "prefix": "app",
      "architect": {
        "build": {
          "builder": "@angular-devkit/build-angular:application",
          "options": {
            "outputPath": "dist/storeroom-app",
            "index": "src/index.html",
            "browser": "src/main.ts",
            "polyfills": [
              "zone.js"
            ],
            "tsConfig": "tsconfig.app.json",
            "assets": [
              "src/favicon.ico",
              "src/assets"
            ],
            "styles": [
              "src/styles.css"
            ],
            "scripts": []
          },
          "configurations": {
            "production": {
              "budgets": [
                {
                  "type": "initial",
                  "maximumWarning": "500kb",
                  "maximumError": "1mb"
                },
                {
                  "type": "anyComponentStyle",
                  "maximumWarning": "2kb",
                  "maximumError": "4kb"
                }
              ],
              "outputHashing": "all"
            },
            "development": {
              "optimization": false,
              "extractLicenses": false,
              "sourceMap": true
            }
          },
          "defaultConfiguration": "production"
        },
        "serve": {
          "builder": "@angular-devkit/build-angular:dev-server",
          "configurations": {
            "production": {
              "buildTarget": "storeroom-app:build:production"
            },
            "development": {
              "buildTarget": "storeroom-app:build:development"
            }
          },
          "defaultConfiguration": "development"
        },
        "extract-i18n": {
          "builder": "@angular-devkit/build-angular:extract-i18n",
          "options": {
            "buildTarget": "storeroom-app:build"
          }
        },
        "test": {
          "builder": "@angular-devkit/build-angular:karma",
          "options": {
            "polyfills": [
              "zone.js",
              "zone.js/testing"
            ],
            "tsConfig": "tsconfig.spec.json",
            "assets": [
              "src/favicon.ico",
              "src/assets"
            ],
            "styles": [
              "src/styles.css"
            ],
            "scripts": []
          }
        }
      }
    }
  }
}
```

### `storeroom/storeroom-fe-angular/package.json` (package-config)

```json
{
  "name": "storeroom-fe-angular",
  "version": "0.0.0",
  "scripts": {
    "ng": "ng",
    "start": "ng serve",
    "build": "ng build",
    "watch": "ng build --watch --configuration development",
    "test": "ng test"
  },
  "private": true,
  "dependencies": {
    "@angular/animations": "^22.0.0",
    "@angular/common": "^22.0.0",
    "@angular/compiler": "^22.0.0",
    "@angular/core": "^22.0.0",
    "@angular/forms": "^22.0.0",
    "@angular/platform-browser": "^22.0.0",
    "@angular/platform-browser-dynamic": "^22.0.0",
    "@angular/router": "^22.0.0",
    "rxjs": "~7.8.0",
    "tslib": "^2.6.0",
    "zone.js": "~0.15.0"
  },
  "devDependencies": {
    "@angular/build": "^22.0.0",
    "@angular/cli": "^22.0.0",
    "@angular/compiler-cli": "^22.0.0",
    "@types/jasmine": "~5.1.0",
    "jasmine-core": "~5.1.0",
    "karma": "~6.4.0",
    "karma-chrome-launcher": "~3.2.0",
    "karma-coverage": "~2.2.0",
    "karma-jasmine": "~5.1.0",
    "karma-jasmine-html-reporter": "~2.1.0",
    "typescript": "~7.0.0"
  }
}
```

## File Import Graph

Which files import which — useful for understanding data flow.

### Lifeboard-legacy
- `/home/g3/repos/g3labz/lifeboard/lifeboard-legacy/js/bootstrap.bundle.js` → `jquery`
- `/home/g3/repos/g3labz/lifeboard/lifeboard-legacy/js/bootstrap.js` → `jquery`, `popper.js`
- `/home/g3/repos/g3labz/lifeboard/lifeboard-legacy/js/npm.js` → `../../js/transition.js`, `../../js/alert.js`, `../../js/button.js`, `../../js/carousel.js`, `../../js/collapse.js`, `../../js/dropdown.js`, `../../js/modal.js`, `../../js/tooltip.js`, `../../js/popover.js`, `../../js/scrollspy.js`, `../../js/tab.js`, `../../js/affix.js`

### Finances
- `/home/g3/repos/g3labz/lifeboard/finances/finances-legacy/src/services/localdb.js` → `../Providers/localStorage.js`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-legacy/src/app/index.js` → `../Services/localDB.js`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/finance.mapper.spec.ts` → `./finance.mapper`, `../dto/finance.dto`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/finance.mapper.ts` → `../../models/finance.model`, `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/infrastructure/providers/local-storage.provider.ts` → `@angular/core`, `../../core/ports/storage.port`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/infrastructure/repositories/local-finance.repository.ts` → `@angular/core`, `../../core/ports/finance-repository.port`, `../../core/ports/storage.port`, `../../models/finance.model`, `../../core/dto/finance.dto`, `../../core/mappers/finance.mapper`, `../../core/seeds/finances-v4.seed`, `../../core/seeds/investments-hardware.seed`

### lifeboard-storeroom-storeroom-fe-angular
- `/home/g3/repos/g3labz/lifeboard/storeroom/storeroom-fe-angular/src/main.ts` → `@angular/platform-browser`, `./app/app.config`, `./app/app.component`

### lifeboard-glorified-todo-gtodo-fe-angular
- `/home/g3/repos/g3labz/lifeboard/glorified-todo/gtodo-fe-angular/src/main.ts` → `@angular/platform-browser`, `./app/app.config`, `./app/app`

### finances-fe-angular-app-services
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/app.component.spec.ts` → `@angular/core/testing`, `./app.component`, `./services/finance.service`, `./core/ports/storage.port`, `./infrastructure/providers/local-storage.provider`, `./core/ports/finance-repository.port`, `./infrastructure/repositories/local-finance.repository`, `./models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/app.component.ts` → `@angular/core`, `@angular/common`, `./services/finance.service`, `./components/header/header.component`, `./components/dashboard/dashboard.component`, `./components/transactions/transactions.component`, `./components/reconciliation-matrix/reconciliation-matrix.component`, `./components/cards-view/cards-view.component`, `./components/saving-view/saving-view.component`, `./components/budget-blueprint/budget-blueprint.component`, `./components/ap-comparison/ap-comparison.component`, `./components/novacoop-payroll/novacoop-payroll.component`, `./components/emancipation-inventory/emancipation-inventory.component`, `./components/ap-comparison-v2/ap-comparison-v2.component`, `./components/investments/investments.component`, `./components/hardware-setup/hardware-setup.component`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/app.config.ts` → `@angular/core`, `@angular/router`, `./app.routes`, `./core/ports/storage.port`, `./infrastructure/providers/local-storage.provider`, `./core/ports/finance-repository.port`, `./infrastructure/repositories/local-finance.repository`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/services/finance.service.spec.ts` → `@angular/core/testing`, `./finance.service`, `../core/ports/storage.port`, `../infrastructure/providers/local-storage.provider`, `../core/ports/finance-repository.port`, `../infrastructure/repositories/local-finance.repository`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/services/finance.service.ts` → `@angular/core`, `../models/finance.model`, `../core/ports/finance-repository.port`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/ap-comparison/ap-comparison.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/ap-comparison-v2/ap-comparison-v2.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/budget-blueprint/budget-blueprint.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/cards-view/cards-view.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/dashboard/dashboard.component.ts` → `@angular/core`, `@angular/common`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/emancipation-inventory/emancipation-inventory.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/hardware-setup/hardware-setup.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/header/header.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/investments/investments.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/novacoop-payroll/novacoop-payroll.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/reconciliation-matrix/reconciliation-matrix.component.ts` → `@angular/core`, `@angular/common`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/saving-view/saving-view.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/transactions/transactions.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/helpers/transaction.helper.spec.ts` → `./transaction.helper`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/helpers/transaction.helper.ts` → `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/ports/finance-repository.port.ts` → `@angular/core`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/ports/storage.port.ts` → `@angular/core`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/seeds/finances-v4.seed.ts` → `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/seeds/investments-hardware.seed.ts` → `../dto/finance.dto`

### Storeroom
- `/home/g3/repos/g3labz/lifeboard/storeroom/storeroom-fe-angular/src/app/app.routes.ts` → `@angular/router`
- `/home/g3/repos/g3labz/lifeboard/storeroom/storeroom-fe-angular/src/app/app.config.ts` → `@angular/core`, `@angular/router`, `./app.routes`
- `/home/g3/repos/g3labz/lifeboard/storeroom/storeroom-fe-angular/src/app/app.component.spec.ts` → `@angular/core/testing`, `./app.component`
- `/home/g3/repos/g3labz/lifeboard/storeroom/storeroom-fe-angular/src/app/app.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`

### Glorified-todo
- `/home/g3/repos/g3labz/lifeboard/glorified-todo/gtodo-fe-angular/src/app/app.config.ts` → `@angular/core`
- `/home/g3/repos/g3labz/lifeboard/glorified-todo/gtodo-fe-angular/src/app/app.spec.ts` → `@angular/core/testing`, `./app`
- `/home/g3/repos/g3labz/lifeboard/glorified-todo/gtodo-fe-angular/src/app/app.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `./services/task.service`, `./models/task.model`
- `/home/g3/repos/g3labz/lifeboard/glorified-todo/gtodo-fe-angular/src/app/services/task.service.ts` → `@angular/core`, `../models/task.model`

### Housesheet
- `/home/g3/repos/g3labz/lifeboard/housesheet/housesheet-fe-angular/src/app/app.component.spec.ts` → `@angular/core/testing`, `./app.component`
- `/home/g3/repos/g3labz/lifeboard/housesheet/housesheet-fe-angular/src/app/app.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`

<!-- MIKK-END -->

---
name: desloppify
description: >
  Multi-language codebase health scanner. Use when the user explicitly asks
  to run desloppify, scan for technical debt, get a health score, or create
  a cleanup plan. Do NOT trigger for general code review, renaming, or
  fixing individual bugs.
---

<!-- desloppify-begin -->
<!-- desloppify-skill-version: 7 -->

# Desloppify

## 1. Your Job

Maximise the **strict score** honestly. Your main cycle: **scan → plan → execute → rescan**. Follow the scan output's **INSTRUCTIONS FOR AGENTS** — don't substitute your own analysis.

**Don't be lazy.** Do large refactors and small detailed fixes with equal energy. If it takes touching 20 files, touch 20 files. If it's a one-line change, make it. No task is too big or too small — fix things properly, not minimally.

## 2. The Workflow

Three phases, repeated as a cycle.

### Monorepos and multi-project directories

If the workspace contains multiple programs (e.g., frontend + backend in sibling folders), scan each one separately — do not scan the parent directory:

```bash
desloppify --lang typescript scan --path ./frontend
desloppify --lang python scan --path ./backend
```

Each `--path` target should be a single coherent project. Scanning a parent that contains multiple programs mixes state and path context, producing unreliable results.

### Phase 1: Scan and review — understand the codebase

```bash
desloppify scan --path .       # analyse the codebase
desloppify status              # check scores — are we at target?
```

After scanning, **always run `desloppify next`** — it tells you exactly what to do, in order. Don't interpret the scan output yourself or ask the user what to do. Just run `next` and follow its instructions.

The scan will tell you if subjective dimensions need review. Follow its instructions. To trigger a review manually:
```bash
desloppify review --prepare    # then follow your runner's review workflow
```

### Phase 2: Plan — decide what to work on

After reviews, triage stages and plan creation appear in the execution queue surfaced by `next`. Complete them in order — `next` tells you what each stage expects in the `--report`:
```bash
desloppify next                                        # shows the next execution workflow step
desloppify plan triage --stage observe --report "themes and root causes..."
desloppify plan triage --stage reflect --report "comparison against completed work..."
desloppify plan triage --stage organize --report "summary of priorities..."
desloppify plan triage --complete --strategy "execution plan..."
```

For automated triage: `desloppify plan triage --run-stages --runner codex` (Codex), `--runner claude` (Claude), or `--runner rovodev` (Rovo Dev). Options: `--only-stages`, `--dry-run`, `--stage-timeout-seconds`.

Then shape the queue. **The plan shapes everything `next` gives you** — `next` is the execution queue, not the full backlog. Don't skip this step.

```bash
desloppify plan                          # see the living plan details
desloppify plan queue                    # compact execution queue view
desloppify plan reorder <pat> top        # reorder — what unblocks the most?
desloppify plan cluster create <name>    # group related issues to batch-fix
desloppify plan focus <cluster>          # scope next to one cluster
desloppify plan skip <pat>              # defer — hide from next
```

### Phase 3: Execute — grind the queue to completion

Trust the plan and execute. Don't rescan mid-queue — finish the queue first.

**Branch first.** Create a dedicated branch — never commit health work directly to main:
```bash
git checkout -b desloppify/code-health    # or desloppify/<focus-area>
desloppify config set commit_pr 42        # link a PR for auto-updated descriptions
```

**The loop:**
```bash
# 1. Get the next item from the execution queue
desloppify next

# 2. Fix the issue in code

# 3. Resolve it (next shows the exact command including required attestation)

# 4. When you have a logical batch, commit and record
git add <files> && git commit -m "desloppify: fix 3 deferred_import findings"
desloppify plan commit-log record      # moves findings uncommitted → committed, updates PR

# 5. Push periodically
git push -u origin desloppify/code-health

# 6. Repeat until the queue is empty
```

Score may temporarily drop after fixes — cascade effects are normal, keep going.
If `next` suggests an auto-fixer, run `desloppify autofix <fixer> --dry-run` to preview, then apply.

**When the queue is clear, go back to Phase 1.** New issues will surface, cascades will have resolved, priorities will have shifted. This is the cycle.

## 3. Reference

### Key concepts

- **Tiers**: T1 auto-fix → T2 quick manual → T3 judgment call → T4 major refactor.
- **Auto-clusters**: related findings are auto-grouped in `next`. Drill in with `next --cluster <name>`.
- **Zones**: production/script (scored), test/config/generated/vendor (not scored). Fix with `zone set`.
- **Wontfix cost**: widens the lenient↔strict gap. Challenge past decisions when the gap grows.

### Scoring

Overall score = **25% mechanical** + **75% subjective**.

- **Mechanical (25%)**: auto-detected issues — duplication, dead code, smells, unused imports, security. Fixed by changing code and rescanning.
- **Subjective (75%)**: design quality review — naming, error handling, abstractions, clarity. Starts at **0%** until reviewed. The scan will prompt you when a review is needed.
- **Strict score** is the north star: wontfix items count as open. The gap between overall and strict is your wontfix debt.
- **Score types**: overall (lenient), strict (wontfix counts), objective (mechanical only), verified (confirmed fixes only).

### Reviews

Four paths to get subjective scores:

- **Local runner (Codex)**: `desloppify review --run-batches --runner codex --parallel --scan-after-import` — automated end-to-end.
- **Local runner (Claude)**: `desloppify review --prepare` → launch parallel subagents → `desloppify review --import merged.json` — see skill doc overlay for details.
- **Local runner (Rovo Dev)**: `desloppify review --run-batches --runner rovodev --parallel --scan-after-import` — automated end-to-end via `acli rovodev run` subprocesses.
- **Cloud/external**: `desloppify review --external-start --external-runner claude` → follow session template → `--external-submit`.
- **Manual path**: `desloppify review --prepare` → review per dimension → `desloppify review --import file.json`.

**Batch output vs import filenames:** Individual batch outputs from subagents must be named `batch-N.raw.txt` (plain text/JSON content, `.raw.txt` extension). The `.json` filenames in `--import merged.json` or `--import findings.json` refer to the final merged import file, not individual batch outputs. Do not name batch outputs with a `.json` extension.

**Subagent parallelism limit:** Do not launch every review batch at once. Run subagents in small waves, usually **3-5 concurrent agents**, and wait for a wave to finish before starting the next. If agents return empty, partial, or rate-limit-shaped results, reduce the wave size and retry only failed batches. Launching 20+ subagents at once can exhaust API quota and produce no usable review output.

- Import first, fix after — import creates tracked state entries for correlation.
- Target-matching scores trigger auto-reset to prevent gaming. Use the blind-review workflow described in your agent overlay doc (e.g. `docs/CLAUDE.md`, `docs/HERMES.md`).
- Even moderate scores (60-80) dramatically improve overall health.
- Stale dimensions auto-surface in `next` — just follow the queue.

**Integrity rules:** Score from evidence only — no prior chat context, score history, or target-threshold anchoring. When evidence is mixed, score lower and explain uncertainty. Assess every requested dimension; never drop one.

#### Review output format

Return machine-readable JSON for review imports. For `--external-submit`, include `session` from the generated template:

```json
{
  "session": {
    "id": "<session_id_from_template>",
    "token": "<session_hmac_from_template>"
  },
  "assessments": {
    "<dimension_from_query>": 0
  },
  "findings": [
    {
      "dimension": "<dimension_from_query>",
      "identifier": "short_id",
      "summary": "one-line defect summary",
      "related_files": ["relative/path/to/file.py"],
      "evidence": ["specific code observation"],
      "suggestion": "concrete fix recommendation",
      "confidence": "high|medium|low"
    }
  ]
}
```

`findings` MUST match `query.system_prompt` exactly (including `related_files`, `evidence`, and `suggestion`). Use `"findings": []` when no defects found. Import is fail-closed: invalid findings abort unless `--allow-partial` is passed. Assessment scores are auto-applied from trusted internal or cloud session imports. Legacy `--attested-external` remains supported.

#### Import paths

- Robust session flow (recommended): `desloppify review --external-start --external-runner claude` → use generated prompt/template → run printed `--external-submit` command.
- Durable scored import (legacy): `desloppify review --import findings.json --attested-external --attest "I validated this review was completed without awareness of overall score and is unbiased."`
- Findings-only fallback: `desloppify review --import findings.json`

#### Reviewer agent prompt

Runners that support agent definitions (Cursor, Copilot, Gemini) can create a dedicated reviewer agent. Use this system prompt:

```
You are a code quality reviewer. You will be given a codebase path, a set of
dimensions to score, and what each dimension means. Read the code, score each
dimension 0-100 from evidence only, and return JSON in the required format.
Do not anchor to target thresholds. When evidence is mixed, score lower and
explain uncertainty.
```

See your editor's overlay section below for the agent config format.

### Plan commands

```bash
desloppify plan reorder <cluster> top       # move all cluster members at once
desloppify plan reorder <a> <b> top        # mix clusters + findings in one reorder
desloppify plan reorder <pat> before -t X  # position relative to another item/cluster
desloppify plan cluster reorder a,b top    # reorder multiple clusters as one block
desloppify plan resolve <pat>              # mark complete
desloppify plan reopen <pat>               # reopen
desloppify backlog                          # broader non-execution backlog
```

### Commit tracking

```bash
desloppify plan commit-log                      # see uncommitted + committed status
desloppify plan commit-log record               # record HEAD commit, update PR description
desloppify plan commit-log record --note "why"  # with rationale
desloppify plan commit-log record --only "smells::*"  # record specific findings only
desloppify plan commit-log history              # show commit records
desloppify plan commit-log pr                   # preview PR body markdown
desloppify config set commit_tracking_enabled false  # disable guidance
```

After resolving findings as `fixed`, the tool shows uncommitted work, committed history, and a suggested commit message. After committing externally, run `record` to move findings from uncommitted to committed and auto-update the linked PR description.

### Agent directives

Directives are messages shown to agents at lifecycle phase transitions — use them to switch models, set constraints, or give context-specific instructions.

```bash
desloppify directives                     # show all configured directives
desloppify directives set execute "Switch to claude-sonnet-4-6. Focus on speed."
desloppify directives set triage "Switch to claude-opus-4-6. Read carefully."
desloppify directives set review "Use blind packet. Do not anchor on previous scores."
desloppify directives unset execute       # remove a directive
```

Available phases: `execute`, `review`, `triage`, `workflow`, `scan` (and fine-grained variants like `review_initial`, `triage_postflight`, etc.).

### Quick reference

```bash
desloppify next --count 5                         # top 5 execution items
desloppify next --cluster <name>                  # drill into a cluster
desloppify backlog --count 5                      # top 5 backlog items outside execution
desloppify show <pattern>                         # filter by file/detector/ID
desloppify show --status open                     # all open findings
desloppify plan skip --permanent "<id>" --note "reason" --attest "..." # accept debt
desloppify exclude <path>                         # exclude a directory from scanning
desloppify config show                            # show all config including excludes
desloppify scan --path . --reset-subjective       # reset subjective baseline to 0
```

## 4. Fix Tool Issues Upstream

When desloppify itself appears wrong or inconsistent — a bug, a bad detection, a crash, confusing output — **fix it and open a PR**. If you can't confidently fix it, file an issue instead.

### Fix and PR (preferred)

Clone the tool repo to a temp directory, make the fix there, and verify it works against the project you're scanning before pushing.

```bash
git clone https://github.com/peteromallet/desloppify.git /tmp/desloppify-fix
cd /tmp/desloppify-fix
git checkout -b fix/<short-description>
```

Make your changes, then run the test suite and verify the fix against the original project:

```bash
python -m pytest desloppify/tests/ -q
python -m desloppify scan --path <project-root>   # the project you were scanning
```

Once it looks good, push and open a PR:

```bash
git add <files> && git commit -m "fix: <what and why>"
git push -u origin fix/<short-description>
gh pr create --title "fix: <short description>" --body "$(cat <<'EOF'
## Problem
<what went wrong — include the command and output>

## Fix
<what you changed and why>
EOF
)"
```

Clean up after: `rm -rf /tmp/desloppify-fix`

### File an issue (fallback)

If the fix is unclear or the change needs discussion, open an issue at `https://github.com/peteromallet/desloppify/issues` with a minimal repro: command, path, expected output, actual output.

## Prerequisite

`command -v desloppify >/dev/null 2>&1 && echo "desloppify: installed" || echo "NOT INSTALLED — run: uvx --from git+https://github.com/peteromallet/desloppify.git desloppify"`

If `uvx` is not available: `pip install desloppify[full] && desloppify setup`

<!-- desloppify-end -->

## Gemini CLI Overlay

Gemini CLI has experimental subagent support, but subagents currently run
sequentially (not in parallel). Review dimensions one at a time.

### Setup

Enable subagents in Gemini CLI settings:
```json
{
  "experimental": {
    "enableAgents": true
  }
}
```

Optionally define a reviewer agent in `.gemini/agents/desloppify-reviewer.md`:

```yaml
---
name: desloppify-reviewer
description: Scores subjective codebase quality dimensions for desloppify
kind: local
tools:
  - read_file
  - search_code
temperature: 0.2
max_turns: 10
---
```

Use the prompt from the "Reviewer agent prompt" section above.

### Review workflow

Invoke the reviewer agent for each group of dimensions sequentially.
Even without parallelism, isolating dimensions across separate agent
invocations prevents score bleed between concerns.

Merge assessments and findings, then import.

When Gemini CLI adds parallel subagent execution, split dimensions across
concurrent agent calls instead.

<!-- desloppify-overlay: gemini -->
<!-- desloppify-end -->
