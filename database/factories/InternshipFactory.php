<?php

namespace Database\Factories;

use App\Models\Company;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Internship>
 */
class InternshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jobProfiles = [
            //== Backend Developer Profile ==
            [
                'title' => 'Backend Developer',
                'skills' => ['Proficiency in PHP and Laravel framework', 'Strong knowledge of Python (Django, Flask)', 'Experience with Go (Golang) or Rust', 'Familiarity with Java (Spring) or C# (.NET)', 'Strong SQL skills with MySQL or PostgreSQL', 'Experience with NoSQL databases like MongoDB or Redis', 'Deep understanding of RESTful API design and GraphQL', 'Knowledge of microservices and event-driven architecture', 'Experience with caching strategies (Redis, Memcached)', 'Understanding of OOP and functional programming paradigms'],
                'responsibilities' => ['Design, develop, and maintain server-side logic and APIs', 'Design and implement database schemas and migrations', 'Write clean, high-performance, and scalable code', 'Optimize applications for maximum speed and reliability', 'Participate in code reviews to maintain code quality', 'Integrate with third-party services and APIs', 'Ensure data security and protection'],
            ],
            //== Frontend Developer Profile ==
            [
                'title' => 'Frontend Developer',
                'skills' => ['Strong proficiency in JavaScript/TypeScript', 'Deep experience with a modern framework like React, Vue, or Angular', 'Expertise in HTML5 and CSS3/SASS', 'Experience with state management libraries like Redux, Vuex, or MobX', 'Knowledge of front-end build tools like Webpack or Vite', 'Understanding of responsive and mobile-first design principles', 'Familiarity with testing libraries like Jest or React Testing Library', 'Knowledge of web performance optimization and accessibility (WCAG) standards'],
                'responsibilities' => ['Translate UI/UX design wireframes into high-quality, responsive code', 'Develop new user-facing features and components', 'Ensure the technical feasibility of UI/UX designs', 'Build reusable code and libraries for future use', 'Collaborate with backend developers to integrate APIs', 'Optimize application for maximum speed and scalability across different browsers'],
            ],
            //== Data Analyst Profile ==
            [
                'title' => 'Data Analyst',
                'skills' => ['Strong proficiency in SQL for complex data querying', 'Advanced experience with data analysis using Python (Pandas, NumPy, Matplotlib)', 'Knowledge of R is a strong plus', 'Expertise in data visualization tools like Tableau, PowerBI, or Looker', 'Solid understanding of statistical concepts and A/B testing', 'Excellent spreadsheet skills with Excel or Google Sheets', 'Familiarity with web analytics tools (Google Analytics, Mixpanel)'],
                'responsibilities' => ['Perform data cleaning, validation, and preprocessing on large datasets', 'Analyze complex data sets to identify trends, patterns, and business insights', 'Develop and automate reports and interactive dashboards for business stakeholders', 'Present data-driven insights and strategic recommendations to leadership', 'Design and analyze A/B tests to measure product impact', 'Collaborate with various teams to understand their data requirements'],
            ],
            //== DevOps Engineer Profile ==
            [
                'title' => 'DevOps Engineer',
                'skills' => ['Strong experience with cloud platforms (AWS, GCP, or Azure)', 'Proficiency with containerization (Docker) and orchestration (Kubernetes)', 'Deep experience with CI/CD tools like Jenkins, GitLab CI, or GitHub Actions', 'Strong scripting skills (Bash, Python, or Go)', 'Knowledge of Infrastructure as Code (IaC) with Terraform or Ansible', 'Familiarity with monitoring tools like Prometheus, Grafana, or Datadog', 'Understanding of networking concepts (DNS, TCP/IP, Firewalls)'],
                'responsibilities' => ['Build and maintain robust CI/CD pipelines for automated testing and deployment', 'Manage, scale, and monitor cloud infrastructure', 'Automate infrastructure provisioning, configuration, and management processes', 'Ensure application performance, uptime, and reliability (SRE)', 'Implement and manage security best practices within the infrastructure (DevSecOps)', 'Manage logging and monitoring systems to ensure visibility'],
            ],
            //== UI/UX Designer Profile ==
            [
                'title' => 'UI/UX Designer',
                'skills' => ['Mastery of design and prototyping tools (Figma, Sketch, Adobe XD)', 'A strong portfolio of compelling design projects', 'Deep experience with user research methodologies (interviews, surveys, usability testing)', 'Expertise in wireframing, user journey mapping, and creating interactive prototypes', 'Solid understanding of user-centered design principles, mobile-first design, and design systems', 'Basic understanding of HTML/CSS capabilities'],
                'responsibilities' => ['Conduct user research and evaluate user feedback to inform design decisions', 'Create user flows, wireframes, storyboards, and interactive prototypes', 'Collaborate with product managers and engineers to define and implement innovative solutions', 'Execute all visual design stages from concept to final hand-off to engineering', 'Establish and promote design guidelines, best practices, and standards', 'Present design concepts and rationale to stakeholders'],
            ],
            //== Mobile Developer Profile ==
            [
                'title' => 'Mobile Developer',
                'skills' => ['Proficiency in Swift for iOS development or Kotlin for Android development', 'Experience with cross-platform frameworks like Flutter or React Native', 'Knowledge of mobile-specific design patterns (MVVM, VIPER)', 'Experience with mobile-specific APIs and third-party libraries', 'Familiarity with publishing applications on the App Store or Google Play Store', 'Understanding of mobile performance optimization and memory management'],
                'responsibilities' => ['Design and build advanced applications for the iOS or Android platform', 'Collaborate with cross-functional teams to define and ship new mobile features', 'Unit-test code for robustness, including edge cases, usability, and general reliability', 'Work on bug fixing and improving application performance', 'Continuously discover, evaluate, and implement new technologies to maximize development efficiency'],
            ],
            //== QA Engineer Profile ==
            [
                'title' => 'Quality Assurance Engineer',
                'skills' => ['Strong experience with both manual and automated testing', 'Proficiency with testing frameworks like Selenium, Cypress, or Playwright', 'Experience writing clear, concise, and comprehensive test plans and test cases', 'Knowledge of API testing tools like Postman or Insomnia', 'Familiarity with bug tracking software like Jira', 'Understanding of different testing types (Integration, System, Regression)'],
                'responsibilities' => ['Review requirements and specifications to provide timely and meaningful feedback', 'Create detailed, comprehensive, and well-structured test plans and test cases', 'Design, develop, and execute automation scripts using open source tools', 'Identify, record, document thoroughly, and track bugs', 'Perform thorough regression testing when bugs are resolved'],
            ],
            //== Cybersecurity Analyst Profile ==
            [
                'title' => 'Cybersecurity Analyst',
                'skills' => ['Knowledge of security principles and frameworks (NIST, ISO 27001)', 'Experience with vulnerability assessment tools (Nessus, OpenVAS)', 'Understanding of network security, firewalls, and intrusion detection systems', 'Familiarity with the OWASP Top 10 vulnerabilities', 'Basic scripting skills for security automation (Python, Bash)', 'Knowledge of identity and access management (IAM)'],
                'responsibilities' => ['Monitor security alerts and conduct incident response and investigation', 'Perform vulnerability scanning and assist in penetration testing activities', 'Analyze security breaches to identify the root cause', 'Assist in the development and implementation of security policies and procedures', 'Stay up-to-date with the latest security threats and trends'],
            ],
            //== Data Engineer Profile ==
            [
                'title' => 'Data Engineer',
                'skills' => ['Strong programming skills, especially in Python or Scala', 'Experience building and maintaining ETL/ELT pipelines', 'Knowledge of data warehousing solutions like BigQuery, Redshift, or Snowflake', 'Familiarity with data pipeline orchestration tools like Apache Airflow', 'Experience with big data technologies like Spark or Hadoop', 'Proficiency in SQL and data modeling'],
                'responsibilities' => ['Design, construct, install, test, and maintain data management systems', 'Build robust and scalable data pipelines to move data across different systems', 'Ensure data quality, integrity, and availability', 'Develop data models and schemas for the data warehouse', 'Collaborate with data scientists and analysts to meet their data requirements'],
            ],
        ];


        $fakerEn = FakerFactory::create('en_US');
        $profile = fake()->randomElement($jobProfiles);

        $openUntil = Carbon::instance(fake()->dateTimeBetween('+1 week', '+2 months'));
        $startDate = $openUntil->copy()->addWeeks(fake()->numberBetween(1, 4));
        $endDate = $startDate->copy()->addMonths(fake()->numberBetween(3, 6));

        return [
            'company_id' => Company::factory(),

            'title' => $profile['title'] . ' Intern',
            'type' => fake()->randomElement(['remote', 'hybrid', 'on_site']),
            'location' => fake()->city(),
            'description' => "We are looking for a highly motivated and talented " . $profile['title'] . " Intern to join our world-class technology team. This is a unique opportunity to gain hands-on experience by working on real-world projects that impact millions of users. " . $fakerEn->paragraph(1),
            'requirements' => fake()->randomElements($profile['skills'], fake()->numberBetween(4, 6)),
            'responsibilities' => [
                ['title' => 'Primary Responsibilities', 'items' => fake()->randomElements($profile['responsibilities'], fake()->numberBetween(3, 4))],
                ['title' => 'Team & Personal Growth', 'items' => ['Actively participate in our agile development process.', 'Collaborate with an assigned mentor to achieve learning objectives.', 'Present findings or project results at the end of the internship period.']],
            ],
            'eligibility_criteria' => [
                'Currently pursuing a Bachelor\'s or Master\'s degree in a relevant technical field (e.g., Computer Science, Engineering, Design).',
                'Must be an active student in their 6th or 7th semester.',
                'A strong portfolio or GitHub profile showcasing your skills.',
                'Minimum GPA of 3.20.',
            ],
            'open_until' => $openUntil,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}
