select u.name user_name, c.name community_name, p.name permission_name from users u
    join community_members cm on cm.user_id = u.id
    join communities c on cm.community_id = c.id
    join community_member_permissions cmp on cmp.member_id = cm.id
    join permissions p on p.id = cmp.permission_id
where (u.name like '%T%' and p.name like '%articles%')
and CHAR_LENGTH(c.name) > 14;