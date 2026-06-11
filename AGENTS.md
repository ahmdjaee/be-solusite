# AGENTS.md

Panduan ini dibaca Codex setiap mulai sesi di repo ini. Isi file ini harus berisi aturan yang selalu berlaku untuk proyek, bukan instruksi sekali pakai.

## Backend rules

- Ikuti pola Laravel yang sudah ada di repo.
- Jangan menambah dependency produksi baru tanpa alasan kuat dan konfirmasi.
- Jaga controller tetap tipis. Untuk data demo dan struktur UI, prioritaskan `PanelData`.
- Gunakan named routes untuk link internal agar URL tidak mudah rusak.

## Slicing rules / frontend rules

- ikuti slicing style yang sudah ada.
- gunakan component yang ada di ui kit `ui-kit.blade.php`.
- Pakai komponen di `resources/views/components` sebelum membuat markup berulang baru.
- Pertahankan visual admin panel yang rapi, padat, dan mudah discan.
- Jangan membuat landing page marketing kecuali memang diminta.
- Pastikan layout responsive dan tidak ada teks/button yang saling overlap di mobile.