CREATE PROCEDURE test.GetComments()
begin
	select c.*, usrLogin
		from test.comments c
			inner join users on usrID=cmtUserID
		order by cmtImageID; 
END;