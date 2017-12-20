### MDP Member Manager
QR Code Generator For Member MDP

### How To
- **from Project Root, do:**
- edit file ```bootstrap.php``` | Set ```$environtment``` to ```dev``` to see all error
- run ```composer install```
- run ```php databases/migrations/create_member_table.php```
- Set Permission of qrcodes image files to 777 (read, write, execute access to all) at ```projectfolder/assets/qrcodes/```
- run ```http://localhost/projectfolder```

### Requirement
- PHP 5.6.x
- MySQL
- Composer
- PHP-CLI (to populate database migration)
