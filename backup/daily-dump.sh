# dump data every hr
#00 * * * * /bin/bash /var/www/dump/daily_dump.sh > /var/www/cronjob.log 2>/var/www/cronjob.error.log
# clean dump file every first day(and 2 minutes) of month
#2 0 1 * * rm /var/www/dump/*.xz
#!/usr/bin/env bash

FILENAME=$(date +"%Y%m%d-%R".sql)
LO="/var/www/dump/"
EXT=".xz"
mysqldump -q -Y -u [user] -p[pass] word_combine > $LO$FILENAME && xz -9 $LO$FILENAME
s3cmd put $LO$FILENAME$EXT s3://[bucket-path]/$FILENAME$EXT
