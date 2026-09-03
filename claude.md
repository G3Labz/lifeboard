<repository_context>
  <name>Lifeboard</name>
  <stats>
    <files>67</files>
    <functions>482</functions>
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
  "version": "0.3.9",
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
    "packageManager": "npm",
    "analytics": false
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
  "version": "0.1.0",
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
  },
  "cli": {
    "analytics": false
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

### lifeboard-storeroom-storeroom-fe-angular
- `/home/g3/repos/g3labz/lifeboard/storeroom/storeroom-fe-angular/src/main.ts` → `@angular/platform-browser`, `./app/app.config`, `./app/app.component`

### lifeboard-glorified-todo-gtodo-fe-angular
- `/home/g3/repos/g3labz/lifeboard/glorified-todo/gtodo-fe-angular/src/main.ts` → `@angular/platform-browser`, `./app/app.config`, `./app/app`

### finances-fe-angular-app-services
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/app.component.ts` → `@angular/core`, `@angular/common`, `./services/finance.service`, `./components/header/header.component`, `./components/dashboard/dashboard.component`, `./components/transactions/transactions.component`, `./components/reconciliation-matrix/reconciliation-matrix.component`, `./components/cards-view/cards-view.component`, `./components/saving-view/saving-view.component`, `./components/budget-blueprint/budget-blueprint.component`, `./components/ap-comparison/ap-comparison.component`, `./components/novacoop-payroll/novacoop-payroll.component`, `./components/emancipation-inventory/emancipation-inventory.component`, `./components/ap-comparison-v2/ap-comparison-v2.component`, `./components/investments/investments.component`, `./components/hardware-setup/hardware-setup.component`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/app.config.ts` → `@angular/core`, `@angular/router`, `./app.routes`, `./core/ports/storage.port`, `./infrastructure/providers/local-storage.provider`, `./core/ports/finance-repository.port`, `./infrastructure/repositories/local-finance.repository`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/services/finance.service.ts` → `@angular/core`, `../models/finance.model`, `../core/ports/finance-repository.port`, `../core/helpers/emancipation.helper`, `../core/helpers/novacoop-fiscal.helper`, `../core/helpers/investment.helper`, `../core/helpers/hardware-setup.helper`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/ap-comparison/ap-comparison.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/ap-comparison-v2/ap-comparison-v2.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/budget-blueprint/budget-blueprint.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`, `../../core/helpers/financial-metrics.helper`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/cards-view/cards-view.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/dashboard/dashboard.component.ts` → `@angular/core`, `@angular/common`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/emancipation-inventory/emancipation-inventory.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/hardware-setup/hardware-setup.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/header/header.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/investments/investments.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/novacoop-payroll/novacoop-payroll.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/reconciliation-matrix/reconciliation-matrix.component.ts` → `@angular/core`, `@angular/common`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/saving-view/saving-view.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/transactions/transactions-toolbar.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/components/transactions/transactions.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `../../services/finance.service`, `../../models/finance.model`, `./transactions-toolbar.component`, `../../core/helpers/transaction-sort.helper`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/helpers/emancipation.helper.ts` → `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/helpers/hardware-setup.helper.ts` → `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/helpers/investment.helper.ts` → `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/helpers/novacoop-fiscal.helper.ts` → `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/helpers/transaction.helper.ts` → `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/apartment.mapper.ts` → `../../models/finance.model`, `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/budget.mapper.ts` → `../../models/finance.model`, `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/definition.mapper.ts` → `../../models/finance.model`, `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/emancipation.mapper.ts` → `../../models/finance.model`, `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/hardware.mapper.ts` → `../../models/finance.model`, `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/investment.mapper.ts` → `../../models/finance.model`, `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/novacoop.mapper.ts` → `../../models/finance.model`, `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/mappers/transaction.mapper.ts` → `../../models/finance.model`, `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/ports/finance-repository.port.ts` → `@angular/core`, `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/ports/storage.port.ts` → `@angular/core`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/seeds/finances-v4.seed.ts` → `../dto/finance.dto`, `../fixtures/apartment-links.fixture`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/seeds/investments-hardware.seed.ts` → `../dto/finance.dto`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/infrastructure/repositories/generic-local-store.ts` → `../../core/ports/storage.port`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/infrastructure/repositories/local-finance.repository.ts` → `@angular/core`, `../../core/ports/finance-repository.port`, `../../core/ports/storage.port`, `./generic-local-store`, `../../models/finance.model`, `../../core/dto/finance.dto`, `../../core/mappers/finance.mapper`, `../../core/seeds/finances-v4.seed`, `../../core/seeds/investments-hardware.seed`

### Storeroom
- `/home/g3/repos/g3labz/lifeboard/storeroom/storeroom-fe-angular/src/app/app.routes.ts` → `@angular/router`
- `/home/g3/repos/g3labz/lifeboard/storeroom/storeroom-fe-angular/src/app/app.config.ts` → `@angular/core`, `@angular/router`, `./app.routes`
- `/home/g3/repos/g3labz/lifeboard/storeroom/storeroom-fe-angular/src/app/app.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`

### Glorified-todo
- `/home/g3/repos/g3labz/lifeboard/glorified-todo/gtodo-fe-angular/src/app/app.config.ts` → `@angular/core`
- `/home/g3/repos/g3labz/lifeboard/glorified-todo/gtodo-fe-angular/src/app/app.ts` → `@angular/core`, `@angular/common`, `@angular/forms`, `./services/task.service`, `./models/task.model`
- `/home/g3/repos/g3labz/lifeboard/glorified-todo/gtodo-fe-angular/src/app/services/task.service.ts` → `@angular/core`, `../models/task.model`

### Housesheet
- `/home/g3/repos/g3labz/lifeboard/housesheet/housesheet-fe-angular/src/app/app.component.ts` → `@angular/core`, `@angular/common`, `@angular/forms`

### gtodo-fe-angular-app-services
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/core/helpers/transaction-sort.helper.ts` → `../../models/finance.model`
- `/home/g3/repos/g3labz/lifeboard/finances/finances-fe-angular/src/app/infrastructure/providers/local-storage.provider.ts` → `@angular/core`, `../../core/ports/storage.port`


