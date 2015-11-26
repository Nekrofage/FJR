rm donnees-fjr.sql.gz
rm structure-fjr.sql.gz
mysqldump -u fjr -pmot2passe -d fjr > structure-fjr.sql
mysqldump -u fjr -pmot2passe -tv fjr > donnees-fjr.sql
gzip structure-fjr.sql
gzip donnees-fjr.sql
ls -l *.gz
