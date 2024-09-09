<style>
            .section-two .short-input,
            .section-two .short-select {
                max-width: 200px;
                /* Lebar sesuai kebutuhan */
            }

            .section-two .form-inline {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
            }

            .section-two .form-group {
                flex: 1;
            }

            /* Flexbox untuk elemen-elemen input yang bersebelahan */
            .date-inputs {
                display: flex;
                justify-content: space-between;
            }

            .date-inputs .form-group {
                flex: 1;
                margin-right: 10px;
                /* Jarak antar input */
            }

            .date-inputs .form-group:last-child {
                margin-right: 0;
                /* Menghapus margin kanan pada elemen terakhir */
            }

            .short-input,
            .short-select {
                max-width: 200px;
                /* Lebar sesuai kebutuhan */
            }

            /* Flexbox untuk form-group dalam satu baris */
            .inline-group {
                display: flex;
                justify-content: space-between;
            }

            .inline-group .form-group {
                flex: 1;
                margin-right: 10px;
                /* Jarak antar elemen */
            }

            .inline-group .form-group:last-child {
                margin-right: 0;
                /* Menghapus margin kanan pada elemen terakhir */
            }

            .inline-group .form-control {
                width: 100%;
                /* Memastikan input mengambil seluruh lebar yang tersedia */
            }

            .short-input,
            .short-select {
                max-width: 100%;
                /* Menghilangkan batasan lebar untuk elemen dalam inline-group */
            }
        </style>
