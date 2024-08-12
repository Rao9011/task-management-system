1 first run project using php artisan serve
2 run migration php artisan migration
3 run also seeder because we define role in seeder
4 now when all process run first time show with project base url php welcom page
5 next http://127.0.0.1:8000/admin/dashboard it return redirect login page if not admi aor manager aor user login
6 we make two page login and register
7 first Admin ,Manager and User can create account where pass role in request when create account
8 let supose if Admin can create account account it return redirect admin/dashboard pasge
9 here admin can create Project update,show and delete project
10 also admin can see Task each project and task creater name and task assigner name
11 Admin can also comment of each task and see task comment list
12 Admin can also see task status
13 admin can generate pdf of task report related of project
14 admin can logout
15 Now When manager can create account base on role it return redirect manager/dashbaord
16 here manager can create task aaupdate task delete task and show task
17 manager can assign task any user
18 manager can see task status 
19 manager can comment any task and also see maeesage of list 
20  Now when employee User can create accont it return redieect employee/dashboard page
21 here Each employee can see our task and see who can assign these task
22 show all task list
23 user can change task statsu
24 user can leave comment of the task and aslo show all comment list of same  task 
25 in comment show task name comment and User name,Manager name and Admin name show in User name head
