b1.
- tạo role(vai tro)
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$role = Role::create(['name' => 'writer']);

- tạo PermiPssion(quyen)
$permission = Permission::create(['name' => 'edit articles']);

Trao quyen : $permission->assignRole($role); 

lay user cos quyen : $users = User::role('writer')->get()
hoặc trả về các user có quyền truy cập edit articles
$users = User::permission('edit articles')->get();
