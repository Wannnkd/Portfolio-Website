<?php

namespace App\Http\Controllers;

class PortfolioController
{
    public function index()
    {
        $profile = [
            'name'    => 'Juan',
            'role'    => 'BINUS Computer Science Student',
            'focus'   => 'Cyber Security',
            'stage'   => 'Continuous Learning',
            'status'  => 'Open to Work & Collaborate',
        ];

        $skillGroups = [
            [
                'title' => 'Offensive Security',
                'skills' => ['Nmap', 'Burp Suite', 'Kali Linux', 'Gobuster'],
            ],
            [
                'title' => 'Mobile Security & Reverse Engineering',
                'skills' => ['MobSF', 'Frida', 'JADX', 'ADB', 'Ghidra'],
            ],
            [
                'title' => 'Network, System, & Infrastructure',
                'skills' => ['Linux', 'Wireshark', 'Cisco', 'Docker'],
            ],
            [
                'title' => 'Software Development ',
                'skills' => ['HTML','CSS','Javascript','C','C++','Python', 'PHP', 'Laravel', 'MySQL', 'Git'],
            ],
        ];

        $projects = [
            [
                'tag'   => 'Software Development',
                'title' => 'Pilahin',
                'desc'  => 'Pilahin is a directory for waste banks, built based on web app. The community collection points where people bring sorted recyclables and get paid by weight. It helps people find nearby waste banks, check estimated material prices, and find pickup services.',
                'stack' => ['React', 'Tailwind CSS', 'Laravel', 'Git', 'Docker'],
                'year' => '2026',
                'status' => 'Completed',
                'problem'=> 'Waste banks already exist, but informations about it are hard to find. Prices are not always published, finding waste banks are difficult, and pickup services are hard to discover.',
                'github' => 'https://github.com/PutuReyvan/Wastebank-app',
            ],
            [
                'tag'   => 'DevSecOps',
                'title' => 'Github Actions Pipeline',
                'desc'  => 'A GitHub Actions pipeline that scans, build, and ships a team ivoice app. Differents mixed jobs, no manual checks.',
                'stack' => ['GitHub Actions', 'Docker', 'Trivy', 'CodeQL', 'TruffleHog'],
                'year' => '2026',
                'status' => 'Completed',
                'problem' => 'Manual development workflows can lead to inconsistent builds, missed security checks, merge conflicts, and a higher risk of human error.',
                'github' => 'https://github.com/PutuReyvan/react-docker',
            ],
            [
                'tag'   => 'Software Development',
                'title' => 'FoodSafe',
                'desc'  => 'FoodSafe is a surplus food marketplace. It connects restaurant with customer who want to purchase quality surplus meals at discounted prices for direct pickup.',
                'stack' => ['Laravel', 'Tailwind CSS', 'Vite', 'MySQL', 'Docker'],
                'year' => '2026',
                'status' => 'Completed',
                'problem' => 'Restaurants often discard unsold food that is still suitable for consumption, resulting in unnecessary food waste and lost revenue opportunities.',
                'github' => 'https://github.com/livenintendoswitch/Food-Safe',
            ],
        ];

        $contacts = [
            ['label' => 'EMAIL',    'value' => 'juankairupan@gmail.com',              'href' => 'mailto:juankairupan@gmail.com'],
            ['label' => 'GITHUB',   'value' => 'github.com/Wannnkd',         'href' => 'https://github.com/Wannnkd'],
            ['label' => 'LINKEDIN', 'value' => 'linkedin.com/in/juan-kairupan',    'href' => 'https://linkedin.com/in/juan-kairupan'],
        ];

        return view('portfolio.index', compact('profile', 'skillGroups', 'projects', 'contacts'));
    }
}
