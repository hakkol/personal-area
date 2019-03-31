## Installation

Run:
```
git clone https://github.com/hakkol/personal-area.git
```
to clone the repository.

Run:

```
cd projectname
composer install
```


Copy ***.env.example*** to ***.env***.

Run:

```
php artisan key:generate
```
to regenerate secure key.

Edit ***.env*** for mysql configuration. Add ***ADMIN_EMAIL*** and ***ADMIN_PASSWORD*** for custom access to the admin site

Run:

```
php artisan migrate --seed
```
to create and populate tables.

Edit ***.env*** for emails configuration.

Run:

```
npm install
npm run dev
```
to manage assets.

Edit ***ORDER_ADMIN_EMAIL*** in ***.env*** for site admin mail

## Tricks

Administrator:
```
email = admin@local.host, password = 12341234
```