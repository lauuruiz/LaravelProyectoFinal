create database posizv2019db default character set utf8 collate utf8_unicode_ci;                                                                                                         
create user uposizv2019@localhost identified with mysql_native_password by 'uposizv2019';
grant all on posizv2019db.* to uposizv2019@localhost;
flush privileges;
exit