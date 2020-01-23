#### php -c /etc/php/cli-php7.2/php.ini -f archive.phar

##### Include Path: phar:///tmp/archive.phar:.:/usr/share/php7:/usr/share/php

```diff
+ is_dir("config/"): true
+ is_dir("./config/"): true
- is_dir("../config/"): true
+ is_dir("archive.phar/config/"): false
+ is_dir("phar:///tmp/archive.phar/config/"): true

+ is_file("config/test.php"): true
+ is_file("./config/test.php"): false
- is_file("../config/test.php"): true
+ is_file("archive.phar/config/test.php"): false
+ is_file("phar:///tmp/archive.phar/config/test.php"): true

+ file_get_contents("config/test.php"): true
- file_get_contents("./config/test.php"): false
- file_get_contents("../config/test.php"): true
+ file_get_contents("archive.phar/config/test.php"): false
+ file_get_contents("phar:///tmp/archive.phar/config/test.php"): true

+ is_readable("config/test.php"): true
+ is_readable("./config/test.php"): true
- is_readable("../config/test.php"): true
+ is_readable("archive.phar/config/test.php"): false
+ is_readable("phar:///tmp/archive.phar/config/test.php"): true

- phar.readonly = ''
- is_writeable("config/"): false
- is_writeable("./config/"): false
+ is_writeable("../config/"): false
+ is_writeable("archive.phar/config/"): false
- is_writeable("phar:///tmp/archive.phar/config/"): false

- phar.readonly = ''
- is_writeable("config/test.php"): false
- is_writeable("./config/test.php"): false
+ is_writeable("../config/test.php"): false
+ is_writeable("archive.phar/config/test.php"): false
- is_writeable("phar:///tmp/archive.phar/config/test.php"): false

! glob("config/*"): false
! glob("./config/*"): false
+ glob("../config/*"): false
+ glob("archive.phar/config/*"): false
! glob("phar:///tmp/archive.phar/config/*"): false

- scandir("config/*"): false
- scandir("./config/*"): false
+ scandir("../config/*"): false
+ scandir("archive.phar/config/*"): false
+ scandir("phar:///tmp/archive.phar/config/*"): true

+ include("config/test.php"): true
- include("./config/test.php"): false
- include("../config/test.php"): true
+ include("archive.phar/config/test.php"): false
+ include("phar:///tmp/archive.phar/config/test.php"): true
```

#### php -dphar.readonly=0 -f archive.phar                                       

##### Include Path: phar:///tmp/archive.phar:.:/usr/share/php7:/usr/share/php

```diff     
+ is_dir("config/"): true
+ is_dir("./config/"): true
- is_dir("../config/"): true
+ is_dir("archive.phar/config/"): false
+ is_dir("phar:///tmp/archive.phar/config/"): true

+ is_file("config/test.php"): true
- is_file("./config/test.php"): false
- is_file("../config/test.php"): true
+ is_file("archive.phar/config/test.php"): false
+ is_file("phar:///tmp/archive.phar/config/test.php"): true

+ file_get_contents("config/test.php"): true
- file_get_contents("./config/test.php"): false
- file_get_contents("../config/test.php"): true
+ file_get_contents("archive.phar/config/test.php"): false
+ file_get_contents("phar:///tmp/archive.phar/config/test.php"): true

+ is_readable("config/test.php"): true
+ is_readable("./config/test.php"): true
- is_readable("../config/test.php"): true
+ is_readable("archive.phar/config/test.php"): false
+ is_readable("phar:///tmp/archive.phar/config/test.php"): true

+ phar.readonly = '0'
- is_writeable("config/"): false
- is_writeable("./config/"): false
+ is_writeable("../config/"): false
+ is_writeable("archive.phar/config/"): false
- is_writeable("phar:///tmp/archive.phar/config/"): false

+ phar.readonly = '0'
- is_writeable("config/test.php"): false
- is_writeable("./config/test.php"): false
+ is_writeable("../config/test.php"): false
+ is_writeable("archive.phar/config/test.php"): false
- is_writeable("phar:///tmp/archive.phar/config/test.php"): false

! glob("config/*"): false
! glob("./config/*"): false
+ glob("../config/*"): false
+ glob("archive.phar/config/*"): false
! glob("phar:///tmp/archive.phar/config/*"): false

- scandir("config/*"): false
- scandir("./config/*"): false
+ scandir("../config/*"): false
+ scandir("archive.phar/config/*"): false
+ scandir("phar:///tmp/archive.phar/config/*"): true

+ include("config/test.php"): true
- include("./config/test.php"): false
- include("../config/test.php"): true
+ include("archive.phar/config/test.php"): false
+ include("phar:///tmp/archive.phar/config/test.php"): true
```
