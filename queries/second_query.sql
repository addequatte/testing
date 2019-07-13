select c.id community_id, c.name community_name, p.name permission_name, count(cm.id) member_count from communities c
    join community_members cm on cm.community_id = c.id
    join community_member_permissions cmp on cmp.member_id = cm.id
    join permissions p on p.id = cmp.permission_id
group by c.id, p.id
having member_count > 4
order by c.id DESC , member_count;