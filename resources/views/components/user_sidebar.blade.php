<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="index.html">
			<span class="align-middle">Perpustakaan SDN 173450</span>
		</a>

		<ul class="sidebar-nav">

			<li class="sidebar-item active">
				<a class="sidebar-link" href="{{ route('user./') }}">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>

			<li class="sidebar-header">
				Master
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('user.book') }}">
					<i class="align-middle" data-feather="book"></i> <span class="align-middle">Buku</span>
				</a>
			</li>

			<li class="sidebar-header">
				Perpustakaan
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('user.borrowing_book') }}">
					<i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Peminjaman</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('user.book_return') }}">
					<i class="align-middle" data-feather="feather"></i> <span class="align-middle">Pengembalian</span>
				</a>
			</li>
		</ul>
	</div>
</nav>