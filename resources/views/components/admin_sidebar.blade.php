<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="index.html">
			<span class="align-middle">Perpustakaan SDN 173450</span>
		</a>

		<ul class="sidebar-nav">

			<li class="sidebar-item active">
				<a class="sidebar-link" href="{{ route('admin./') }}">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>

			<li class="sidebar-header">
				Master
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.member_class') }}">
					<i class="align-middle" data-feather="box"></i> <span class="align-middle">Kelas</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.member') }}">
					<i class="align-middle" data-feather="user"></i> <span class="align-middle">Anggota</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.shelf') }}">
					<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Rak</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.category_book') }}">
					<i class="align-middle" data-feather="tag"></i> <span class="align-middle">Kategori Buku</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.book') }}">
					<i class="align-middle" data-feather="book"></i> <span class="align-middle">Buku</span>
				</a>
			</li>

			<li class="sidebar-header">
				Perpustakaan
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.borrowing_book') }}">
					<i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Peminjaman</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.book_return') }}">
					<i class="align-middle" data-feather="layers"></i> <span class="align-middle">Pengembalian</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.export_borrowing_book') }}">
					<i class="align-middle" data-feather="printer"></i> <span class="align-middle">Report Peminjaman</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.export_book_return') }}">
					<i class="align-middle" data-feather="printer"></i> <span class="align-middle">Report Pengembalian</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('admin.penalty') }}">
					<i class="align-middle" data-feather="feather"></i> <span class="align-middle">Daftar Denda</span>
				</a>
			</li>
		</ul>
	</div>
</nav>