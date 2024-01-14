# Entry Code
JoshBarker.co.uk

### Install
1. Install the package using Composer:
```bash
composer require jarker/entry
```

2. Publish the config
```bash
php artisan vendor:publish --tag=entry-code-config
```
You can then manage the kind of generator and the rules used to generate an entry code.
The config will be located in `config/entry-code.php`.

3. Migrate the database to create the necessary tables:
```bash
php artisan migrate
```

4. Update your User model to expose knowledge of entry codes
```php
use \Jarker\Entry\Models\HasEntryCode;
```

5. (Optional) Generate unallocated codes, these can be reallocated on the manage interface
```bash
php artisan entry-code:generate {count}
```
