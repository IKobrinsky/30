CREATE PROCEDURE test.CheckUser(login varchar(30), password varchar(32))
begin
	select usrID
		from users
		where usrLogin = login 
		  and usrPassword  = password
		limit 1;
END;