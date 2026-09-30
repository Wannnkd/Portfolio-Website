<?php

namespace App\Http\Controllers;

class PortfolioController
{
    public function index()
    {
        $profile = [
            'name'    => 'Juan',
            'role'    => 'Computer Science BINUS ',
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
                'tag'   => 'LAB',
                'title' => 'Home Lab — Vulnerable VM Analysis',
                'desc'  => 'Deskripsi singkat: mengeksplorasi kerentanan pada mesin virtual sengaja rentan (mis. VulnHub/TryHackMe), lalu mendokumentasikan proses eksploitasi dan mitigasinya.',
                'stack' => ['Kali Linux', 'Nmap', 'Metasploit'],
            ],
            [
                'tag'   => 'CTF',
                'title' => 'CTF Writeup Collection',
                'desc'  => 'Kumpulan writeup dari challenge CTF yang pernah dikerjakan, mencakup kategori web exploitation, forensics, dan cryptography dasar.',
                'stack' => ['Web Exploitation', 'Forensics'],
            ],
            [
                'tag'   => 'TOOL',
                'title' => 'Simple Network Scanner',
                'desc'  => 'Tool kecil berbasis Python untuk port scanning dan identifikasi service dasar pada jaringan lokal, dibuat untuk latihan pemahaman socket programming.',
                'stack' => ['Python', 'Sockets'],
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
