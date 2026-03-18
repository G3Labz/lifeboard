# Lifeboard

Lifeboard is a modular dashboard-like project that aggregates several local and cloud-based services into a single interface.

## Project Structure

This is a multi-repo project using **Git Submodules**. Each module is maintained in its own repository under the `G3Labz` organization.

### Submodules

- **Finances**: Personal finance management.
- **Glorified-Todo**: Task and organization tracker.
- **Housesheet**: Data tracking for household activities.
- **Storeroom**: Inventory management tool.

## Submodule Management

Since this is a multi-repo (submoduled) workspace, use the following commands to manage modules.

### Adding a Module as a Submodule

If your module is in a separate Git repository, you can add it to Lifeboard:

```bash
# Add a new submodule
git submodule add https://github.com/G3Labz/repo-name.git module-name

# Commit the submodule addition
git add .gitmodules module-name
git commit -m "Add module-name as submodule"
```

**Converting an existing cloned repo to a submodule:**
```bash
# If you already have a cloned repo inside the workspace:
# 1. First, get the remote URL and module name
cd module-name
REPO_URL=$(git remote get-url origin)
MODULE_NAME=${PWD##*/}

# 2. Move the repo out temporarily
cd ..
mv "$MODULE_NAME" "../${MODULE_NAME}-backup"

# 3. Add it as a proper submodule
git submodule add "$REPO_URL" "$MODULE_NAME"

# 4. Remove backup
rm -rf "../${MODULE_NAME}-backup"

# 5. Commit the submodule
git add .gitmodules "$MODULE_NAME"
git commit -m "Add $MODULE_NAME as submodule"
```

> **Note:** The move-and-readd method is the most reliable way to convert a nested repo into a submodule.

### Managing Submodules

```bash
# Update a specific submodule to latest commit
git submodule update --remote --merge module-name

# Remove a submodule
git submodule deinit -f module-name
rm -rf .git/modules/module-name
git rm -f module-name
```
