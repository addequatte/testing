select u.name user_name, c.name community_name, cm.joined_at
from users u
         join community_members cm on cm.user_id = u.id
         join communities c on c.id = cm.community_id
where c.created_at >= '2013-01-01 00:00:00'
order by cm.joined_at DESC;