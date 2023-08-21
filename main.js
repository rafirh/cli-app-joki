const readline = require('readline');

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout,
});

const menus = [
    '1. Konversi Huruf ke Angka',
    '2. Kalimat ke Deret Angka',
    '3. Deteksi Huruf Pada Kata',
    '4. Ubah Huruf Menjadi # atau &'
]

printMenu();

rl.question('\nPilih Function (1 - 4): ', (answer) => {
    switch (answer) {
        case '1':
            konversiHuruf();
            break;
        case '2':
            kalimatKeDeretAngka();
            break;
        case '3':
            deteksiHurufPadaKata();
            break;
        case '4':
            ubahHuruf();
            break;
        default:
            console.log('Pilihan tidak tersedia');
            break;
    }
});

function konversiHuruf() {
    console.log("\n============= Konversi Huruf ke Angka =============");
    rl.question('\nMasukkan huruf: ', (answer) => {
        const alphabet = 'abcdefghijklmnopqrstuvwxyz';

        const index = alphabet.indexOf(answer.toLowerCase()) + 1;
        console.log(`\n${index}`);
        rl.close();
    });
}

function kalimatKeDeretAngka() {
    console.log("\n============= Kalimat ke Deret Angka =============");
    rl.question('\nMasukkan kalimat: ', (answer) => {
        const alphabet = 'abcdefghijklmnopqrstuvwxyz';

        let result = '';
        for (let i = 0; i < answer.length; i++) {
            const index = alphabet.indexOf(answer[i].toLowerCase()) + 1;
            result += `${index} `;
        }
        console.log(`\n${result}`);
        rl.close();
    });
}

function deteksiHurufPadaKata() {
    console.log("\n============= Deteksi Huruf Pada Kata =============");
    rl.question('\nMasukkan kata: ', (wordInput) => {
        rl.question('Masukkan huruf: ', (charInput) => {
            let count = 0;
            for (let i = 0; i < wordInput.length; i++) {
                if (wordInput[i].toLowerCase() === charInput.toLowerCase()) {
                    count++;
                }
            }

            if (count === 0) {
                console.log(`\nTidak ada`);
            } else if (count === 1) {
                console.log(`\nTunggal`);
            } else if (count > 1) {
                console.log(`\nBanyak`);
            }
            rl.close();
        });
    });
}

function ubahHuruf() {
    console.log("\n============= Ubah Huruf Menjadi # atau & =============");
    rl.question('\nMasukkan kalimat: ', (answer) => {
        answer = answer.toLowerCase();
        const charFrequency = {};
        
        for (let i = 0; i < answer.length; i++) {
            const char = answer[i];
            charFrequency[char] = (charFrequency[char] || 0) + 1;
        }

        let result = '';
        for (let i = 0; i < answer.length; i++) {
            const char = answer[i];
            result += charFrequency[char] === 1 ? '#' : '&';
        }
        
        console.log(`\n${result}`);
        rl.close();
    });
}

function printMenu() {
    console.log("============= Daftar Function =============\n");
    for (let i = 0; i < menus.length; i++) {
        console.log(menus[i]);
    }
}