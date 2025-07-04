@echo off
REM --- CLEANUP SCRIPT FOR PDC TICKETING DB ---
REM --- This will remove all data except admin user (id=1) ---

REM Set your MySQL credentials here
set DB_USER=root
set DB_PASS=yourpassword
set DB_NAME=pdc_ticketing_db

REM Truncate all tables except useraccounts
mysql -u%DB_USER% -p%DB_PASS% -e "TRUNCATE tbl_auditlog; TRUNCATE tbl_notif; TRUNCATE tbl_ticketreport; TRUNCATE tbl_tickets; TRUNCATE tbl_itemcategory; TRUNCATE tbl_itemlist;" %DB_NAME%

REM Delete all users except admin (id=1)
mysql -u%DB_USER% -p%DB_PASS% -e "DELETE FROM tbl_useraccounts WHERE id <> 1;" %DB_NAME%

echo Database cleanup complete. Only admin user remains.
pause
