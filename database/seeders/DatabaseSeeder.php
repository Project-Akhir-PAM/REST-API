<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Nature',
        ]);

        Category::create([
            'name' => 'Museum',
        ]);

        Category::create([
            'name' => 'Amusement Park',
        ]);

        Category::create([
            'name' => 'Park',
        ]);

        Destination::create([
            'name' => 'Gunung Bromo',
            'img' => 'images/bromo.jpg',
            'location' => 'Lumajang, Kabupaten Lumajang',
            'description' => 'Gunung Bromo adalah salah satu gunung berapi paling terkenal di Indonesia dan merupakan bagian dari Taman Nasional Bromo Tengger Semeru. Terletak di Provinsi Jawa Timur, gunung ini menawarkan pemandangan alam yang menakjubkan dan mempesona. Dengan ketinggian sekitar 2.329 meter di atas permukaan laut, Gunung Bromo menampilkan sebuah kaldera yang spektakuler dengan puncak gunung berapi aktif yang mengeluarkan asap putih. Lingkungan sekitarnya dipenuhi dengan lautan pasir yang luas dan padang rumput yang hijau, menciptakan pemandangan yang tak terlupakan. Kombinasi keindahan alam, kabut yang mistis, dan matahari terbit yang menakjubkan menjadikan Gunung Bromo sebagai tujuan wisata favorit para pengunjung, baik dari dalam negeri maupun mancanegara.',
            'category_id' => 1,
        ]);

        Destination::create([
            'name' => 'Pulau Komodo',
            'img' => 'images/komodo.jpg',
            'location' => 'Labuan Bajo, Nusa Tenggara Timur',
            'description' => 'Pulau Komodo adalah rumah bagi hewan purba yang terkenal, komodo. Terletak di Provinsi Nusa Tenggara Timur, pulau ini menawarkan keindahan alam yang menakjubkan, perairan biru yang jernih, dan terumbu karang yang memikat. Pengunjung dapat melakukan trekking untuk melihat langsung komodo-komodo raksasa dan menikmati keindahan bawah laut yang luar biasa.',
            'category_id' => 2,
        ]);

        Destination::create([
            'name' => 'Raja Ampat',
            'img' => 'images/rajaampat.jpg',
            'location' => 'Sorong, Papua Barat',
            'description' => 'Raja Ampat adalah surga bagi para penyelam dan pecinta alam. Terletak di Papua Barat, kepulauan ini menawarkan keindahan bawah laut yang tak tertandingi, dengan terumbu karang yang warna-warni dan kehidupan laut yang beragam. Pulau-pulau indah dengan pasir putih dan hutan tropis juga membuat Raja Ampat menjadi destinasi wisata yang menakjubkan.',
            'category_id' => 2,
        ]);

        Destination::create([
            'name' => 'Borobudur',
            'img' => 'images/borobudur.jpg',
            'location' => 'Magelang, Jawa Tengah',
            'description' => 'Candi Borobudur adalah salah satu situs budaya dan religius terbesar di dunia. Terletak di Jawa Tengah, candi ini menampilkan arsitektur yang megah dan relief yang indah. Pengunjung dapat menjelajahi kompleks candi, mengagumi pemandangan alam sekitar, dan merasakan kedamaian spiritual yang terpancar dari tempat ini.',
            'category_id' => 3,
        ]);

        Destination::create([
            'name' => 'Pulau Bali',
            'img' => 'images/bali.jpg',
            'location' => 'Bali',
            'description' => 'Pulau Bali adalah salah satu destinasi wisata paling populer di Indonesia. Terkenal dengan pantainya yang indah, kehidupan malam yang bersemangat, dan budaya yang kaya, Bali menawarkan pengalaman yang lengkap bagi para wisatawan. Dari menjelajahi pemandangan alam yang menakjubkan hingga berpartisipasi dalam upacara keagamaan tradisional, pulau ini memiliki sesuatu untuk semua orang.',
            'category_id' => 4,
        ]);

        Destination::create([
            'name' => 'Taman Laut Bunaken',
            'img' => 'images/bunaken.jpg',
            'location' => 'Manado, Sulawesi Utara',
            'description' => 'Taman Laut Bunaken adalah surga bagi penyelam dengan terumbu karang yang menakjubkan dan kehidupan laut yang melimpah. Terletak di Sulawesi Utara, taman laut ini menawarkan keindahan bawah laut yang spektakuler, dengan berbagai spesies ikan, penyu, dan terumbu karang yang menakjubkan. Selain menyelam, pengunjung juga dapat menikmati keindahan pantai dan menjelajahi kehidupan laut dengan snorkeling.',
            'category_id' => 4,
        ]);

        Destination::create([
            'name' => 'Pulau Derawan',
            'img' => 'images/derawan.jpg',
            'location' => 'Kabupaten Berau, Kalimantan Timur',
            'description' => 'Pulau Derawan adalah surga tropis di Kalimantan Timur, yang terkenal dengan kehidupan bawah laut yang luar biasa. Pulau ini menawarkan pantai berpasir putih, air laut yang jernih, dan terumbu karang yang subur. Pengunjung dapat menyelam atau snorkeling untuk menemukan penyu hijau yang langka dan berenang di antara ikan-ikan berwarna-warni.',
            'category_id' => 2,
        ]);

        Destination::create([
            'name' => 'Taman Nasional Ujung Kulon',
            'img' => 'images/ujungkulon.jpg',
            'location' => 'Banten',
            'description' => 'Taman Nasional Ujung Kulon adalah salah satu kawasan konservasi terbesar di Indonesia dan merupakan tempat tinggal bagi badak Jawa yang terancam punah. Terletak di Provinsi Banten, taman nasional ini menawarkan keindahan alam yang belum terjamah, dengan hutan lebat, pantai yang indah, dan keanekaragaman hayati yang melimpah. Pengunjung dapat melakukan trekking, menyaksikan satwa liar, dan menjelajahi keindahan pantai yang eksotis.',
            'category_id' => 3,
        ]);

        Destination::create([
            'name' => 'Pulau Belitung',
            'img' => 'images/belitung.jpg',
            'location' => 'Belitung, Bangka Belitung',
            'description' => 'Pulau Belitung adalah surga tersembunyi di kepulauan Bangka Belitung, terkenal dengan pantai-pantai yang menakjubkan dan batu granit yang unik. Pulau ini menawarkan pasir putih yang lembut, air laut yang jernih, dan formasi batu granit yang menciptakan pemandangan yang menakjubkan. Pengunjung dapat bersantai di pantai, menjelajahi pulau-pulau kecil di sekitar, atau mengikuti tur keliling untuk melihat keindahan alam yang menawan.',
            'category_id' => 1,
        ]);

        Destination::create([
            'name' => 'Pulau Lombok',
            'img' => 'images/lombok.jpg',
            'location' => 'Lombok, Nusa Tenggara Barat',
            'description' => 'Pulau Lombok menawarkan keindahan alam yang spektakuler dengan pantai-pantai yang indah, gunung-gunung yang menjulang, dan budaya Sasak yang kaya. Terletak di Nusa Tenggara Barat, pulau ini menjadi tujuan wisata alternatif yang populer setelah Bali. Pengunjung dapat menikmati pantai-pantai seperti Kuta dan Tanjung Aan, menjelajahi Gunung Rinjani yang megah, atau menyaksikan keindahan air terjun di sekitar pulau.',
            'category_id' => 1,
        ]);

        Destination::create([
            'name' => 'Pulau Mentawai',
            'img' => 'images/mentawai.jpg',
            'location' => 'Kepulauan Mentawai, Sumatera Barat',
            'description' => 'Pulau Mentawai adalah surga bagi para peselancar dan pencinta alam. Terletak di Kepulauan Mentawai, Sumatera Barat, pulau ini menawarkan pantai-pantai yang mempesona, ombak yang hebat, dan hutan hujan tropis yang eksotis. Selain berselancar, pengunjung dapat menjelajahi kehidupan kaya akan budaya suku Mentawai dan menjelajahi keindahan alam yang masih alami.',
            'category_id' => 2,
        ]);

        Destination::create([
            'name' => 'Kepulauan Seribu',
            'img' => 'images/seribu.jpg',
            'location' => 'Jakarta, DKI Jakarta',
            'description' => 'Kepulauan Seribu adalah destinasi wisata pantai yang terletak di lepas pantai Jakarta. Terdiri dari puluhan pulau kecil yang indah, kepulauan ini menawarkan pantai-pantai berpasir putih, terumbu karang yang indah, dan kehidupan laut yang beragam. Pengunjung dapat melakukan aktivitas seperti menyelam, snorkeling, atau sekadar bersantai di pantai yang tenang.',
            'category_id' => 1,
        ]);

        Destination::create([
            'name' => 'Taman Nasional Way Kambas',
            'img' => 'images/waykambas.jpg',
            'location' => 'Lampung',
            'description' => 'Taman Nasional Way Kambas adalah tempat perlindungan gajah liar di Indonesia. Terletak di Provinsi Lampung, taman nasional ini menawarkan keindahan alam yang meliputi hutan hujan, sungai, dan rawa-rawa. Selain gajah, pengunjung juga dapat melihat berbagai spesies satwa langka seperti badak, harimau, dan burung-burung eksotis.',
            'category_id' => 3,
        ]);

        Destination::create([
            'name' => 'Gunung Rinjani',
            'img' => 'images/rinjani.jpg',
            'location' => 'Lombok, Nusa Tenggara Barat',
            'description' => 'Gunung Rinjani adalah gunung tertinggi kedua di Indonesia yang menawarkan pemandangan alam yang spektakuler. Terletak di Pulau Lombok, gunung ini memiliki kaldera yang indah dengan danau Segara Anak di tengahnya. Pendakian ke puncak Rinjani menawarkan petualangan mendebarkan dan pemandangan yang luar biasa, termasuk air terjun dan pemandangan pulau-pulau sekitar.',
            'category_id' => 1,
        ]);

        Destination::create([
            'name' => 'Pulau Weh',
            'img' => 'images/weh.jpg',
            'location' => 'Sabang, Aceh',
            'description' => 'Pulau Weh adalah sebuah pulau kecil di ujung barat Sumatera yang dikenal sebagai surga bagi penyelam. Terletak di Aceh, pulau ini menawarkan terumbu karang yang memukau, kehidupan bawah laut yang melimpah, dan visibilitas air yang luar biasa. Selain menyelam, pengunjung juga dapat menikmati keindahan pantai dan menyaksikan matahari terbenam yang memukau.',
            'category_id' => 2,
        ]);

        Destination::create([
            'name' => 'Taman Nasional Bromo Tengger Semeru',
            'img' => 'images/bromotenggersemeru.jpg',
            'location' => 'Jawa Timur',
            'description' => 'Taman Nasional Bromo Tengger Semeru adalah destinasi wisata yang menggabungkan gunung berapi, kaldera, dan pemandangan alam yang memukau. Terletak di Jawa Timur, taman nasional ini menawarkan pengalaman mendaki Gunung Semeru yang tinggi, menikmati matahari terbit dari puncak Gunung Bromo, dan menjelajahi keindahan alam di sekitarnya.',
            'category_id' => 4,
        ]);

        Destination::create([
            'name' => 'Pulau Morotai',
            'img' => 'images/morotai.jpg',
            'location' => 'Kepulauan Maluku Utara',
            'description' => 'Pulau Morotai adalah destinasi wisata yang terletak di Kepulauan Maluku Utara, dikenal dengan pantai-pantai berpasir putih dan air laut yang jernih. Pulau ini menawarkan keindahan alam yang masih alami, terumbu karang yang memikat, dan kegiatan seperti menyelam, snorkeling, dan berselancar di ombak yang indah.',
            'category_id' => 1,
        ]);

        Destination::create([
            'name' => 'Taman Nasional Gunung Leuser',
            'img' => 'images/gunungleuser.jpg',
            'location' => 'Sumatera Utara, Aceh, Riau',
            'description' => 'Taman Nasional Gunung Leuser adalah tempat yang ideal bagi para pecinta alam dan hewan liar. Terletak di Sumatera Utara, Aceh, dan Riau, taman nasional ini merupakan rumah bagi orangutan Sumatera yang terancam punah. Pengunjung dapat melakukan trekking, melihat satwa liar seperti harimau, gajah, dan macan tutul, serta menikmati keindahan alam hutan hujan tropis yang melimpah.',
            'category_id' => 3,
        ]);

        Destination::create([
            'name' => 'Pulau Wakatobi',
            'img' => 'images/wakatobi.jpg',
            'location' => 'Kepulauan Wakatobi, Sulawesi Tenggara',
            'description' => 'Pulau Wakatobi adalah destinasi utama bagi penyelam dengan terumbu karang yang spektakuler dan kehidupan bawah laut yang kaya. Terletak di Sulawesi Tenggara, pulau ini menawarkan pengalaman menyelam yang tak terlupakan, dengan ragam ikan tropis, terumbu karang yang berwarna-warni, dan visibilitas air yang baik. Selain itu, pulau ini juga menyuguhkan pantai-pantai yang indah dan kehidupan masyarakat yang tradisional.',
            'category_id' => 2,
        ]);

        Destination::create([
            'name' => 'Danau Toba',
            'img' => 'images/toba.jpg',
            'location' => 'Sumatera Utara',
            'description' => 'Danau Toba adalah danau vulkanik terbesar di Indonesia dan salah satu atraksi terkenal di Sumatera Utara. Danau ini menawarkan pemandangan yang menakjubkan, dengan pulau Samosir di tengahnya. Pengunjung dapat menikmati pemandangan indah danau, berkeliling pulau dengan sepeda atau motor, atau menyaksikan kebudayaan Batak yang kaya.',
            'category_id' => 1,
        ]);
    }
}
