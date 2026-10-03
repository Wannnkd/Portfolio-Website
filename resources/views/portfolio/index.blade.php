@extends('layouts.app')

@section('content')
<div class="scroll-progress" aria-hidden="true"></div>

<header class="site">
  <div class="nav-inner">
    <a href="#home" class="brand"><span class="dot"></span>Juan Kairupan</a>
    <nav class="links">
      <a href="#home">Home</a>
      <a href="#about">About me</a>
      <a href="#skills">Skills</a>
      <a href="#projects">Projects</a>
      <a href="#certificates">Certifications</a>
      <a href="#contact">Contact</a>
    </nav>
  </div>
</header>

<main>
  <section class="home" id="home" aria-labelledby="home-title">
    <div class="home-background" aria-hidden="true"></div>
    <div class="home-content">
      <p class="home-greeting">Hello it's</p>

      <h1 class="home-title" id="home-title" data-text="Juan Kairupan">Juan Kairupan</h1>

      <p class="home-description">
        <span>A Computer Science student at BINUS University.</span>
        <span>Exploring the world of cybersecurity.</span>
        <span>Learning how systems work and how to protect them.</span>
        <span>Always curious, always learning.</span>
      </p>
      <div class="home-actions">
        <a class="home-button home-button-primary" href="#projects">
          View Projects
        </a>

        <a
          class="home-button home-button-outline"
          href="{{ asset('files/juan-kairupan-cv.pdf') }}"
          download="Juan-Kairupan-CV.pdf"
        >
          Download CV

          <svg
            width="18"
            height="18"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
          >
            <path d="M12 3v12" />
            <path d="m7 10 5 5 5-5" />
            <path d="M5 16v4h14v-4" />
          </svg>
        </a>
      </div>
    </div>
  </section>

  <section class="hero" id="about">
    <div class="wrap hero-grid">
      <div>
        <h2 class="headline">About Me</h2>
        <p class="lede">Hello, I'm {{ $profile['name'] }}, a student from Bina Nusantara University, majoring in Computer Science, currently pursuing a career in cybersecurity: starting from network security, mobile application security, digital forensic, and cybersecurity mindset on how to attack and defense a system.</p>
        <div class="hero-actions">
          <a href="#projects" class="btn btn-primary">View Projects</a>
          <a href="#contact" class="btn btn-ghost">Contact Me</a>
        </div>
      </div>
      <div class="status-panel">
        <div class="scanline"></div>
        <div class="status-head">
          <span>system_status.log</span>
          <span class="live">active</span>
        </div>
        <div class="status-body">
          <div class="status-row"><span>role</span><span>{{ $profile['role'] }}</span></div>
          <div class="status-row"><span>focus</span><span>{{ $profile['focus'] }}</span></div>
          <div class="status-row"><span>stage</span><span>{{ $profile['stage'] }}</span></div>
          <div class="status-row"><span>status</span><span>{{ $profile['status'] }}</span></div>
        </div>
      </div>
    </div>
  </section>

  <section class="block" id="skills">
    <div class="wrap">
      <div class="block-head">
        <h2 class="block-title">Skills & Technologies</h2>
        <p class="lede">Skills and tools i use to work with.</p>
      </div>
      <div class="skill-groups">
        @foreach ($skillGroups as $group)
        <div class="skill-card">
          <h3>{{ $group['title'] }}</h3>
          <div class="skill-list">
            @foreach ($group['skills'] as $skill)
              <span class="skill-tag">{{ $skill }}</span>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="block" id="projects">
    <div class="wrap">
      <div class="block-head">
        <h2 class="block-title">Projects & experiments</h2>
      </div>
      <div class="project-list">
        @foreach ($projects as $project)
          <article class="project-row">
            <div class="project-copy">
              <div class="project-heading">
                <span class="project-number">
                  {{ sprintf('%02d', $loop->iteration) }}
                </span>

                <span class="project-tag">{{ $project['tag'] }}</span>
              </div>

              <h3 class="project-title">{{ $project['title'] }}</h3>

              <p class="project-timeline">
                <span>{{ $project['year'] ?? 'Tahun belum diisi' }}</span>
                <span>|</span>
                <span>{{ $project['status'] ?? 'Status belum diisi' }}</span>
              </p>

              <p class="project-desc">{{ $project['desc'] }}</p>

              <div class="project-meta">
                @foreach ($project['stack'] as $tech)
                  <span class="meta-chip">{{ $tech }}</span>
                @endforeach
              </div>

              <button
                class="project-details-button"
                type="button"
                data-project-open="project-dialog-{{ $loop->index }}"
                aria-controls="project-dialog-{{ $loop->index }}"
                aria-haspopup="dialog"
              >
                View Details
                <span aria-hidden="true">↗</span>
              </button>
            </div>

            <dialog
              class="project-dialog"
              id="project-dialog-{{ $loop->index }}"
              aria-labelledby="project-dialog-title-{{ $loop->index }}"
            >
              <div class="project-dialog-header">
                <span class="project-tag">{{ $project['tag'] }}</span>

                <button
                  class="project-dialog-close"
                  type="button"
                  data-project-close
                  aria-label="Close project details"
                  autofocus
                >
                  <span aria-hidden="true">×</span>
                </button>
              </div>

              <h2 id="project-dialog-title-{{ $loop->index }}">
                {{ $project['title'] }}
              </h2>

              <p class="project-timeline">
                <span>{{ $project['year'] ?? 'Tahun belum diisi' }}</span>
                <span>|</span>
                <span>{{ $project['status'] ?? 'Status belum diisi' }}</span>
              </p>

              <div class="project-dialog-section">
                <h3>Problem Statement</h3>
                <p>{{ $project['problem'] ?? 'Problem statement belum diisi.' }}</p>
              </div>

              <div class="project-dialog-section">
                <h3>Description</h3>
                <p>{{ $project['details'] ?? $project['desc'] }}</p>
              </div>

              <div class="project-dialog-section">
                <h3>Tech Stack</h3>

                <div class="project-meta">
                  @foreach ($project['stack'] as $tech)
                    <span class="meta-chip">{{ $tech }}</span>
                  @endforeach
                </div>
              </div>

              @if (!empty($project['github']))
                <div class="project-dialog-actions">
                  <a
                    class="project-github-button"
                    href="{{ $project['github'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    View on GitHub
                    <span aria-hidden="true">↗</span>
                  </a>
                </div>
              @endif
            </dialog>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  <section class="block certificates" id="certificates" aria-labelledby="certificates-title">
    <div class="wrap">
      <div class="block-head">
        <h2 class="block-title" id="certificates-title">
          Certifications
        </h2>
      </div>

    <div class="certificate-filters" role="group" aria-label="Filter certificates">
      <button
        class="certificate-filter"
        type="button"
        data-filter="all"
        aria-pressed="true"
        aria-controls="certificate-list"
      >All</button>

      <button
        class="certificate-filter"
        type="button"
        data-filter="offensive"
        aria-pressed="false"
        aria-controls="certificate-list"
      >Offensive Security</button>

      <button
        class="certificate-filter"
        type="button"
        data-filter="defensive"
        aria-pressed="false"
        aria-controls="certificate-list"
      >Defensive Security</button>
    </div>

    <div class="certificate-grid" id="certificate-list">
      <!-- Offensive Security -->
      <article class="certificate-card" data-category="offensive">
        <p class="certificate-issuer">TCM Security</p>
        <h3 class="certificate-name">Practical Junior Penetration Tester (PJPT)</h3>

        <div class="certificate-meta">
          <span>In progress</span>
          <span class="certificate-category">Penetration Testing</span>
          <span class="certificate-status">Exam planned for December 2026</span>
        </div>
      </article>

      <!-- Defensive Security -->
    </div>
  </div>
</section>

  <section class="block" id="contact">
    <div class="wrap">
      <div class="contact-panel">
        <div>
          <h2>Let's build<br><span>something together.</span></h2>
          <p>Open to discussions, project collaboration, or sharing thoughts about computer science or cyber security.</p>
        </div>
        <div class="contact-links">
          @foreach ($contacts as $contact)
          <a class="contact-link" href="{{ $contact['href'] }}" target="_blank" rel="noopener">
            <span class="label">{{ $contact['label'] }}</span>
            <span class="value">{{ $contact['value'] }}</span>
            <span class="contact-arrow" aria-hidden="true">↗</span>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</main>

<footer class="site-footer">
  <div class="wrap footer-inner">
    <a class="footer-brand" href="#home">
      {{ $profile['name'] }}
    </a>

    <p class="footer-copyright">
      © {{ date('Y') }} — Computer Science Student & Cybersecurity Enthusiast - Jakarta, Indonesia
    </p>
  </div>
</footer>

@endsection
