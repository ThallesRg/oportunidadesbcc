<div class="account-nav">
  <ul class="list-group">
    @role('admin')
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'dashboard' ? 'active': ''}}">
      <a href="{{route('account.dashboard')}}" class="account-nav-link">
        <i class="fas fa-chart-line"></i> Dashboard
      </a>
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'view-all-users' ? 'active': ''}}">
      <a href="{{route('account.viewAllUsers')}}" class="account-nav-link">
        <i class="fas fa-users"></i> Visualizar Todos os Usuários
      </a>
    </li>
    @endrole
    @role('author')
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'author-section' ? 'active': ''}}">
      <a href="{{route('account.authorSection')}}" class="account-nav-link">
        <i class="fas fa-chart-line"></i> Seção do Autor
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'post' && request()->segment(3) == 'create' ? 'active': ''}}">
      <a href="{{route('post.create')}}" class="account-nav-link">
        <i class="fas fa-plus-square"></i> Criar vaga de emprego
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'scholarships' && request()->segment(3) == 'create' ? 'active': ''}}">
      <a href="{{route('scholarships.create')}}" class="account-nav-link">
        <i class="fas fa-plus-square"></i> Criar bolsa de estudo
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'intercambios' && request()->segment(3) == 'create' ? 'active': ''}}">
      <a href="{{route('intercambios.create')}}" class="account-nav-link">
        <i class="fas fa-plus-square"></i> Criar intercambio
    </li>
    @endrole
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'overview' ? 'active': ''}}">
      <a href="{{route('account.index')}}" class="account-nav-link">
        <i class="fas fa-user-shield"></i> Conta de Usuário
      </a>
    </li>
    @role('user')
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'become-employer' ? 'active': ''}}">
      <a href="{{route('account.becomeEmployer')}}" class="account-nav-link">
        <i class="fas fa-user-shield"></i> Se torne um empregador
      </a>
    </li>
    @endrole
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'change-password' ? 'active': ''}}">
      <a href="{{route('account.changePassword')}}" class="account-nav-link">
        <i class="fas fa-fingerprint"></i> Trocar senha
      </a>
    </li>
     <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'deactivate' ? 'active': ''}}">
      <a href="{{route('account.deactivate')}}" class="account-nav-link">
        <i class="fas fa-folder-minus"></i> Deletar conta
      </a>
    </li>    
  </ul>
</div>