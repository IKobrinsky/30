CREATE PROCEDURE test.AddUser(login varchar(30), password varchar(32), hash varchar(32))
begin
	insert users (usrLogin, usrPassword, usrHash) select login, password, hash;
END;