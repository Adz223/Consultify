<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Global Academic Partnership Development',
                'price' => 120,
                'eur_price' => 120,
                'mad_price' => 120,
                'description' => "Consultify's Global Academic Partnership Development service is a strategic initiative designed to foster collaboration and partnership between US universities and their international counterparts. Our service focuses on creating mutually beneficial relationships that facilitate the exchange of knowledge, expertise, and resources. The core components of this service are as follows:<br>
                1. Partnership Establishment: Consultify acts as a catalyst, identifying suitable partner institutions for US universities and facilitating the establishment of cooperative agreements. These partnerships are carefully tailored to align with the goals and aspirations of participating institutions.<br>
                
                2. Exchange Programs: Our service includes the creation and management of student and faculty exchange programs. These programs offer students and professors the opportunity to study and teach abroad, enriching their academic experiences and promoting cross-cultural understanding. Consultify manages all logistical aspects, from visa processing to accommodation arrangements.
                <br>
                3. Dual Degree Programs: A key feature of our service is the development of dual degree programs. These programs enable students to earn degrees from both their home institution and their international partner. Consultify collaborates closely with partner universities to design customized dual degree offerings that meet the unique needs of each institution.
                <br>
                4. Curriculum Alignment: To ensure a seamless academic experience, our service assists partner institutions in aligning their curricula. This involves curriculum mapping, faculty collaboration, and quality assurance to maintain academic standards and facilitate credit transfer.
                <br>
                5. Cultural Integration: Recognizing the importance of cultural immersion, we provide support for cultural integration programs. These include language courses, cultural awareness seminars, and resources to help students and faculty adapt to their host institutions and surroundings.
                <br>
                6. Administrative Support: Consultify offers comprehensive administrative support, including legal agreement drafting, financial coordination, and ongoing communication facilitation between partner institutions. Our goal is to streamline administrative processes to ensure the smooth operation of partnerships.
                <br>
                7. Monitoring and Evaluation: Our service includes continuous monitoring and evaluation of partnership activities. We implement feedback mechanisms to gauge the effectiveness of collaborations and ensure that the goals and aspirations of both parties are being met.
                Consultify's Global Academic Partnership Development service aims to create a thriving ecosystem of collaboration that benefits partner universities, their stakeholders, and the global academic community. By focusing on tailored partnerships, exchange programs, and dual degree offerings, our service opens new horizons for educational institutions seeking to expand their international reach and impact.
                Our commitment to excellence, attention to detail, and a deep understanding of the unique needs of each institution set us apart as a trusted partner in building global academic connections. Join us in creating meaningful partnerships that enhance education, foster cultural exchange, and advance the missions of universities worldwide.",
            ],
            [
                'name' => 'Lifelong Coaching',
                'price' => 150,
                'eur_price' => 150,
                'mad_price' => 150,
                'description' => "At our consulting firm, we believe that effective coaching is a life-long journey, and we use a variety of strategies and approaches to support our customers throughout this journey. Our team of expert coaches will work closely with each customer to understand their individual needs, goals, and aspirations. Our coaching strategies and approaches are designed to be flexible, adaptable, and customizable to meet the unique needs of each customer. Whether you are looking to improve your leadership skills, advance your career, or achieve a better work-life balance, we will provide the support and guidance you need to reach your goals. With a focus on continuous learning and personal development, our life-long coaching approach is designed to help our customers succeed both today and in the future.",
            ],
            [
                'name' => 'International Students Enrollment',
                'price' => 120,
                'eur_price' => 120,
                'mad_price' => 120,
                'description' => "As a consulting firm dedicated to empowering international students, we understand the unique challenges and needs that come with studying in the United States. Our team of experts will work closely with each international student to guide them through the entire enrollment process, from researching schools and checking eligibility, to applying for visas and registering for classes. We will provide personalized support and resources to ensure that each student has a successful and fulfilling experience in the US. Whether it's answering questions about the cultural differences, navigating the visa application process, or providing ongoing support and guidance, we are committed to helping international students achieve their academic and personal goals in the US.",
            ]
        ];
        foreach ($services as $srv) {
            $service = new Service;
            $service->service_category_id = 1;
            $service->name = $srv['name'];
            $service->price = $srv['price'];
            $service->eur_price = $srv['eur_price'];
            $service->mad_price = $srv['mad_price'];
            $service->description = $srv['description'];
            $service->is_active = true;
            $service->save();
        }
    }
}
