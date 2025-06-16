<?php

namespace Database\Factories;

use App\Models\Admin;
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
            //== .NET Web Developer ==
            [
                'title' => '.NET Web Developer',
                'skills' => ['C#', '.NET Core', 'ASP.NET MVC', 'Entity Framework', 'SQL Server', 'RESTful APIs', 'Azure or AWS', 'HTML/CSS/JavaScript'],
                'responsibilities' => ['Develop and maintain web applications using the .NET framework', 'Write clean, scalable C# code', 'Create and consume RESTful web services', 'Design and manage SQL Server databases', 'Deploy applications to cloud platforms like Azure', 'Collaborate with frontend developers to integrate user-facing elements'],
            ],
            //== Backend Developer ==
            [
                'title' => 'Backend Developer',
                'skills' => ['Proficiency in PHP and Laravel framework', 'Strong knowledge of Python (Django, Flask)', 'Experience with Go (Golang) or Rust', 'Strong SQL skills with MySQL or PostgreSQL', 'Experience with NoSQL databases like MongoDB or Redis', 'Deep understanding of RESTful API design and GraphQL', 'Knowledge of microservices architecture', 'Experience with caching strategies (Redis, Memcached)'],
                'responsibilities' => ['Design, develop, and maintain server-side logic and APIs', 'Design and implement database schemas and migrations', 'Write clean, high-performance, and scalable code', 'Optimize applications for maximum speed and reliability', 'Participate in code reviews to maintain code quality', 'Integrate with third-party services and APIs'],
            ],
            //== Big Data Engineer (Hadoop) ==
            [
                'title' => 'Big Data Engineer (Hadoop)',
                'skills' => ['Expertise in the Hadoop ecosystem (HDFS, MapReduce, Hive, Pig)', 'Strong programming skills in Java or Scala', 'Experience with Apache Spark', 'Knowledge of data streaming technologies like Kafka or Flink', 'Familiarity with NoSQL databases like HBase or Cassandra', 'Proficiency in scripting languages like Python or Bash'],
                'responsibilities' => ['Design, build, and maintain scalable data pipelines using Hadoop and Spark', 'Process and transform large-scale datasets', 'Manage and monitor Hadoop clusters for performance and reliability', 'Collaborate with data scientists to provide them with clean, accessible data', 'Implement data security and governance policies on the data lake'],
            ],
            //== Blockchain Developer ==
            [
                'title' => 'Blockchain Developer',
                'skills' => ['Proficiency in Solidity for Ethereum smart contract development', 'Understanding of blockchain principles (decentralization, consensus algorithms)', 'Experience with frameworks like Truffle or Hardhat', 'Knowledge of Web3.js or Ethers.js for dApp integration', 'Familiarity with different blockchain platforms (e.g., Polygon, Solana)', 'Understanding of cryptography and security principles'],
                'responsibilities' => ['Design, develop, and deploy smart contracts on blockchain platforms', 'Build decentralized applications (dApps) that interact with smart contracts', 'Write and perform tests for smart contract security and functionality', 'Integrate frontend applications with blockchain networks', 'Stay up-to-date with the latest developments in blockchain technology'],
            ],
            //== Business Process Analyst ==
            [
                'title' => 'Business Process Analyst',
                'skills' => ['Strong analytical and problem-solving skills', 'Proficiency in process mapping and modeling using tools like Visio or BPMN', 'Excellent communication and stakeholder management skills', 'Experience gathering business requirements and documenting specifications', 'Familiarity with project management methodologies (Agile, Scrum)', 'Data analysis skills using Excel or SQL'],
                'responsibilities' => ['Analyze and document existing business processes to identify inefficiencies', 'Gather and document requirements for new process improvements or software systems', 'Act as a liaison between business stakeholders and technical teams', 'Develop process flow diagrams and business cases', 'Facilitate workshops and meetings to align on process changes'],
            ],
            //== Cloud DevOps Engineer ==
            [
                'title' => 'Cloud DevOps Engineer',
                'skills' => ['Strong experience with cloud platforms (AWS, GCP, or Azure)', 'Proficiency with containerization (Docker) and orchestration (Kubernetes)', 'Deep experience with CI/CD tools like Jenkins, GitLab CI, or GitHub Actions', 'Strong scripting skills (Bash, Python, or Go)', 'Knowledge of Infrastructure as Code (IaC) with Terraform or Ansible', 'Familiarity with monitoring tools like Prometheus, Grafana, or Datadog'],
                'responsibilities' => ['Build and maintain robust CI/CD pipelines for automated testing and deployment', 'Manage, scale, and monitor cloud infrastructure', 'Automate infrastructure provisioning, configuration, and management processes', 'Ensure application performance, uptime, and reliability (SRE)', 'Implement and manage security best practices within the infrastructure (DevSecOps)'],
            ],
            //== Cloud Engineer ==
            [
                'title' => 'Cloud Engineer',
                'skills' => ['In-depth knowledge of a major cloud provider (AWS, Azure, GCP)', 'Experience with virtual machines, serverless functions, and cloud storage', 'Understanding of cloud networking (VPCs, subnets, security groups)', 'Experience with Infrastructure as Code (Terraform, CloudFormation)', 'Knowledge of containerization with Docker', 'Familiarity with cloud security best practices'],
                'responsibilities' => ['Design, deploy, and manage scalable and reliable cloud infrastructure', 'Migrate on-premise infrastructure to the cloud', 'Monitor cloud environments for performance and cost-effectiveness', 'Implement and maintain cloud security measures', 'Automate cloud operations and processes using scripting'],
            ],
            //== Cyber Security Engineer ==
            [
                'title' => 'Cyber Security Engineer',
                'skills' => ['Deep understanding of network security, firewalls, and intrusion prevention systems', 'Experience with security information and event management (SIEM) tools like Splunk or ELK Stack', 'Proficiency in penetration testing and vulnerability assessment', 'Strong knowledge of encryption, IAM, and secure coding practices', 'Scripting skills for security automation (Python, PowerShell)', 'Relevant certifications (e.g., CISSP, CEH)'],
                'responsibilities' => ['Engineer and implement security solutions for network and system infrastructure', 'Conduct penetration tests and security audits to identify vulnerabilities', 'Develop and automate security scripts and tools', 'Respond to and investigate security incidents and breaches', 'Design secure network architectures and application infrastructure'],
            ],
            //== Cybersecurity Analyst ==
            [
                'title' => 'Cybersecurity Analyst',
                'skills' => ['Knowledge of security principles and frameworks (NIST, ISO 27001)', 'Experience with vulnerability assessment tools (Nessus, OpenVAS)', 'Understanding of network security, firewalls, and intrusion detection systems', 'Familiarity with the OWASP Top 10 vulnerabilities', 'Basic scripting skills for security automation (Python, Bash)', 'Knowledge of identity and access management (IAM)'],
                'responsibilities' => ['Monitor security alerts and conduct incident response and investigation', 'Perform vulnerability scanning and assist in penetration testing activities', 'Analyze security breaches to identify the root cause', 'Assist in the development and implementation of security policies and procedures', 'Stay up-to-date with the latest security threats and trends'],
            ],
            //== Data Analyst ==
            [
                'title' => 'Data Analyst',
                'skills' => ['Strong proficiency in SQL for complex data querying', 'Advanced experience with data analysis using Python (Pandas, NumPy, Matplotlib)', 'Knowledge of R is a strong plus', 'Expertise in data visualization tools like Tableau, PowerBI, or Looker', 'Solid understanding of statistical concepts and A/B testing', 'Excellent spreadsheet skills with Excel or Google Sheets'],
                'responsibilities' => ['Perform data cleaning, validation, and preprocessing on large datasets', 'Analyze complex data sets to identify trends, patterns, and business insights', 'Develop and automate reports and interactive dashboards for business stakeholders', 'Present data-driven insights and strategic recommendations to leadership', 'Design and analyze A/B tests to measure product impact'],
            ],
            //== Data Integration Developer (ETL) ==
            [
                'title' => 'Data Integration Developer (ETL)',
                'skills' => ['Strong experience with ETL tools like Informatica, Talend, or SSIS', 'Proficiency in SQL and database warehousing concepts', 'Programming/scripting skills in Python or Java', 'Understanding of data modeling and schema design', 'Experience working with various data sources (APIs, databases, flat files)'],
                'responsibilities' => ['Design, develop, and maintain ETL (Extract, Transform, Load) processes', 'Extract data from various source systems', 'Transform and clean data to meet business requirements', 'Load data into target data warehouses or data marts', 'Monitor ETL jobs for performance and reliability'],
            ],
            //== Data Engineer ==
            [
                'title' => 'Data Engineer', // Your original title was correct but this matches Big Data Engineer
                'skills' => ['Strong programming skills, especially in Python or Scala', 'Experience building and maintaining ETL/ELT pipelines', 'Knowledge of data warehousing solutions like BigQuery, Redshift, or Snowflake', 'Familiarity with data pipeline orchestration tools like Apache Airflow', 'Experience with big data technologies like Spark or Hadoop', 'Proficiency in SQL and data modeling'],
                'responsibilities' => ['Design, construct, install, test, and maintain data management systems', 'Build robust and scalable data pipelines to move data across different systems', 'Ensure data quality, integrity, and availability', 'Develop data models and schemas for the data warehouse', 'Collaborate with data scientists and analysts to meet their data requirements'],
            ],
            //== Database Administrator ==
            [
                'title' => 'Database Administrator',
                'skills' => ['Deep expertise in a specific database system (e.g., Oracle, SQL Server, PostgreSQL, MySQL)', 'Strong SQL and T-SQL/PL/SQL scripting skills', 'Experience with database performance tuning and optimization', 'Knowledge of backup, recovery, and disaster recovery procedures', 'Familiarity with database security and user access management'],
                'responsibilities' => ['Install, configure, and maintain database software and systems', 'Monitor database performance and tune queries for optimal speed', 'Implement and manage database backup and recovery plans', 'Manage database security, including user permissions and access control', 'Perform database migrations and upgrades'],
            ],
            //== DevOps Engineer ==
            [
                'title' => 'DevOps Engineer',
                'skills' => ['Strong experience with cloud platforms (AWS, GCP, or Azure)', 'Proficiency with containerization (Docker) and orchestration (Kubernetes)', 'Deep experience with CI/CD tools like Jenkins, GitLab CI, or GitHub Actions', 'Strong scripting skills (Bash, Python, or Go)', 'Knowledge of Infrastructure as Code (IaC) with Terraform or Ansible', 'Familiarity with monitoring tools like Prometheus, Grafana, or Datadog'],
                'responsibilities' => ['Build and maintain robust CI/CD pipelines for automated testing and deployment', 'Manage, scale, and monitor cloud infrastructure', 'Automate infrastructure provisioning, configuration, and management processes', 'Ensure application performance, uptime, and reliability (SRE)', 'Implement and manage security best practices within the infrastructure (DevSecOps)'],
            ],
            //== Front-End Developer ==
            [
                'title' => 'Front-End Developer',
                'skills' => ['Strong proficiency in JavaScript/TypeScript', 'Deep experience with a modern framework like React, Vue, or Angular', 'Expertise in HTML5 and CSS3/SASS', 'Experience with state management libraries like Redux, Vuex, or MobX', 'Knowledge of front-end build tools like Webpack or Vite', 'Understanding of responsive and mobile-first design principles', 'Familiarity with testing libraries like Jest or React Testing Library'],
                'responsibilities' => ['Translate UI/UX design wireframes into high-quality, responsive code', 'Develop new user-facing features and components', 'Ensure the technical feasibility of UI/UX designs', 'Build reusable code and libraries for future use', 'Collaborate with backend developers to integrate APIs', 'Optimize application for maximum speed and scalability across different browsers'],
            ],
            //== Full Stack Developer ==
            [
                'title' => 'Full Stack Developer',
                'skills' => ['Proficiency in both a frontend framework (React, Vue, Angular) and a backend language/framework (Node.js/Express, Python/Django, PHP/Laravel)', 'Strong database skills (SQL and/or NoSQL)', 'Experience building and consuming RESTful APIs', 'Understanding of the full web development lifecycle', 'Knowledge of DevOps principles and CI/CD'],
                'responsibilities' => ['Design and develop both frontend and backend components of a web application', 'Build and maintain databases and server-side infrastructure', 'Develop and integrate APIs', 'Work on projects from conception to final product', 'Manage the end-to-end application lifecycle'],
            ],
            //== Graphic Designer ==
            [
                'title' => 'Graphic Designer',
                'skills' => ['Mastery of the Adobe Creative Suite (Photoshop, Illustrator, InDesign)', 'A strong portfolio showcasing creative and visual design skills', 'Understanding of typography, color theory, and layout principles', 'Experience with creating designs for both print and digital media', 'Knowledge of branding and visual identity systems'],
                'responsibilities' => ['Develop illustrations, logos, and other designs using software or by hand', 'Use color and layout for each graphic to create a compelling visual message', 'Work with copywriters and creative directors to produce final designs', 'Ensure final graphics and layouts are visually appealing and on-brand', 'Amend designs after feedback'],
            ],
            //== HR Generalist ==
            [
                'title' => 'HR Generalist',
                'skills' => ['Broad knowledge of human resources functions (recruiting, onboarding, performance management, compliance)', 'Excellent communication and interpersonal skills', 'Understanding of labor laws and employment regulations', 'Experience with HRIS software (e.g., Workday, BambooHR)', 'Strong organizational and conflict resolution skills'],
                'responsibilities' => ['Manage the full recruitment lifecycle: sourcing, screening, interviewing, and hiring', 'Administer employee compensation and benefits programs', 'Handle employee relations issues, including grievances and investigations', 'Conduct onboarding and new hire orientation', 'Ensure compliance with all federal, state, and local employment laws'],
            ],
            //== Java Full Stack Developer ==
            [
                'title' => 'Java Full Stack Developer',
                'skills' => ['Deep expertise in Java and the Spring Framework (Spring Boot, Spring MVC)', 'Proficiency with frontend technologies like Angular or React', 'Strong experience with ORM frameworks like Hibernate or JPA', 'Knowledge of SQL with databases like Oracle or MySQL', 'Experience with build tools like Maven or Gradle', 'Familiarity with application servers like Tomcat or JBoss'],
                'responsibilities' => ['Design and develop end-to-end web applications using Java and Spring Boot', 'Build RESTful APIs to serve frontend applications', 'Manage database interactions and persistence using Hibernate/JPA', 'Develop responsive user interfaces with Angular or React', 'Participate in the entire application lifecycle, focusing on coding and debugging'],
            ],
            //== Machine Learning Engineer ==
            [
                'title' => 'Machine Learning Engineer',
                'skills' => ['Strong programming skills in Python', 'Deep experience with ML libraries and frameworks (Scikit-learn, TensorFlow, PyTorch)', 'Understanding of machine learning algorithms (e.g., regression, classification, clustering)', 'Experience with data preprocessing, feature engineering, and model evaluation', 'Knowledge of MLOps principles and tools', 'Proficiency in SQL and data manipulation'],
                'responsibilities' => ['Design, build, and train machine learning models to solve business problems', 'Deploy ML models into production environments', 'Monitor and maintain the performance of production models', 'Work with large datasets to extract and prepare data for training', 'Collaborate with stakeholders to understand requirements and deliver AI-driven solutions'],
            ],
            //== Mobile App Developer ==
            [
                'title' => 'Mobile App Developer',
                'skills' => ['Proficiency in Swift for iOS development or Kotlin for Android development', 'Experience with cross-platform frameworks like Flutter or React Native', 'Knowledge of mobile-specific design patterns (MVVM, VIPER)', 'Experience with mobile-specific APIs and third-party libraries', 'Familiarity with publishing applications on the App Store or Google Play Store', 'Understanding of mobile performance optimization'],
                'responsibilities' => ['Design and build advanced applications for the iOS or Android platform', 'Collaborate with cross-functional teams to define and ship new mobile features', 'Unit-test code for robustness, including edge cases, usability, and general reliability', 'Work on bug fixing and improving application performance', 'Continuously discover, evaluate, and implement new technologies'],
            ],
            //== PMO Analyst ==
            [
                'title' => 'PMO Analyst',
                'skills' => ['Strong knowledge of project management methodologies (PMBOK, PRINCE2, Agile)', 'Proficiency with project management software (e.g., Jira, Asana, MS Project)', 'Excellent analytical and reporting skills', 'Experience with resource planning and budget tracking', 'Strong communication and stakeholder management abilities'],
                'responsibilities' => ['Support the Project Management Office (PMO) with reporting and analysis', 'Track project status, risks, issues, and dependencies', 'Prepare and distribute project status reports to stakeholders', 'Assist in the management of project budgets and resource allocation', 'Help maintain project management standards and best practices across the organization'],
            ],
            //== Python Web Developer ==
            [
                'title' => 'Python Web Developer',
                'skills' => ['Strong proficiency in Python', 'Deep experience with a web framework like Django or Flask', 'Understanding of Object-Relational Mapping (ORM) libraries', 'Knowledge of frontend technologies (HTML, CSS, JavaScript) is a plus', 'Experience building and consuming RESTful APIs', 'Familiarity with database systems like PostgreSQL or MySQL'],
                'responsibilities' => ['Write effective, scalable Python code for web applications', 'Develop backend components to improve responsiveness and overall performance', 'Integrate user-facing elements into applications', 'Test and debug programs', 'Implement security and data protection solutions'],
            ],
            //== React Developer ==
            [
                'title' => 'React Developer',
                'skills' => ['Deep expertise in React.js and its core principles', 'Strong proficiency in JavaScript, TypeScript, HTML, and CSS', 'Experience with popular React.js workflows such as Redux or Context API', 'Familiarity with modern frontend build pipelines and tools', 'Knowledge of RESTful APIs and how to consume them', 'Experience with testing libraries like Jest and React Testing Library'],
                'responsibilities' => ['Develop new user-facing features using React.js', 'Build reusable components and front-end libraries for future use', 'Translate designs and wireframes into high-quality code', 'Optimize components for maximum performance across a vast array of web-capable devices and browsers', 'Collaborate with backend developers to integrate APIs'],
            ],
            //== SAP ABAP Developer ==
            [
                'title' => 'SAP ABAP Developer',
                'skills' => ['Strong proficiency in ABAP programming language', 'Experience with SAP modules like SD, MM, FICO', 'Knowledge of ABAP Objects, BAPIs, BAdIs, and enhancement frameworks', 'Familiarity with SAP data dictionary and performance tuning', 'Experience with SAP Fiori/UI5 is a plus'],
                'responsibilities' => ['Develop, test, and debug ABAP programs for SAP applications', 'Create custom reports, interfaces, conversions, and enhancements (RICEFs)', 'Work with functional consultants to understand business requirements', 'Provide technical support and troubleshooting for SAP systems', 'Write technical specifications and documentation for all development work'],
            ],
            //== Software QA Tester ==
            [
                'title' => 'Software QA Tester',
                'skills' => ['Strong experience with both manual and automated testing', 'Proficiency with testing frameworks like Selenium, Cypress, or Playwright', 'Experience writing clear, concise, and comprehensive test plans and test cases', 'Knowledge of API testing tools like Postman or Insomnia', 'Familiarity with bug tracking software like Jira', 'Understanding of different testing types (Integration, System, Regression)'],
                'responsibilities' => ['Review requirements and specifications to provide timely and meaningful feedback', 'Create detailed, comprehensive, and well-structured test plans and test cases', 'Design, develop, and execute automation scripts using open source tools', 'Identify, record, document thoroughly, and track bugs', 'Perform thorough regression testing when bugs are resolved'],
            ],
            //== Test Automation Engineer ==
            [
                'title' => 'Test Automation Engineer',
                'skills' => ['Strong programming skills in a language like Java, Python, or JavaScript', 'Deep experience with automation frameworks like Selenium, Cypress, or Playwright', 'Expertise in building and maintaining automated test suites', 'Knowledge of API test automation', 'Familiarity with CI/CD pipelines and integrating tests into them'],
                'responsibilities' => ['Design and develop robust, scalable, and maintainable test automation frameworks', 'Write automated scripts for regression, integration, and performance testing', 'Integrate automated tests into the CI/CD pipeline', 'Analyze test results, identify bugs, and report findings to the development team', 'Champion best practices for test automation within the engineering organization'],
            ],
            //== UI/UX Designer ==
            [
                'title' => 'UI/UX Designer',
                'skills' => ['Mastery of design and prototyping tools (Figma, Sketch, Adobe XD)', 'A strong portfolio of compelling design projects', 'Deep experience with user research methodologies (interviews, surveys, usability testing)', 'Expertise in wireframing, user journey mapping, and creating interactive prototypes', 'Solid understanding of user-centered design principles and design systems', 'Basic understanding of HTML/CSS capabilities'],
                'responsibilities' => ['Conduct user research and evaluate user feedback to inform design decisions', 'Create user flows, wireframes, storyboards, and interactive prototypes', 'Collaborate with product managers and engineers to define and implement innovative solutions', 'Execute all visual design stages from concept to final hand-off to engineering', 'Establish and promote design guidelines, best practices, and standards'],
            ],
            //== Vue Developer ==
            [
                'title' => 'Vue Developer',
                'skills' => ['Deep expertise in Vue.js and its core ecosystem (Vuex, Vue Router)', 'Strong proficiency in JavaScript, HTML, and CSS', 'Experience with modern frontend development tools and pipelines', 'Knowledge of consuming RESTful APIs', 'Familiarity with testing Vue applications', 'Understanding of responsive design principles'],
                'responsibilities' => ['Develop user-facing applications using Vue.js', 'Build modular and reusable components and libraries', 'Optimize applications for speed and performance', 'Collaborate with backend developers and UI/UX designers', 'Keep up to date with all recent developments in the Vue.js ecosystem'],
            ],
        ];


        $fakerEn = FakerFactory::create('en_US');
        $profile = fake()->randomElement($jobProfiles);

        $openUntil = Carbon::instance(fake()->dateTimeBetween('+1 week', '+2 months'));
        $startDate = $openUntil->copy()->addWeeks(fake()->numberBetween(1, 4));
        $endDate = $startDate->copy()->addMonths(fake()->numberBetween(3, 6));

        // Ensure we don't request more elements than available
        $maxSkills = min(count($profile['skills']), 6);
        $minSkills = min(4, $maxSkills);
        $skillsCount = fake()->numberBetween($minSkills, $maxSkills);

        $maxResponsibilities = min(count($profile['responsibilities']), 4);
        $minResponsibilities = min(3, $maxResponsibilities);
        $responsibilitiesCount = fake()->numberBetween($minResponsibilities, $maxResponsibilities);

        return [
            'company_id' => Company::factory(),
            'admin_id' => Admin::inRandomOrder()->first()->id,

            'title' => $profile['title'] . ' Intern',
            'type' => fake()->randomElement(['remote', 'hybrid', 'on_site']),
            'location' => fake()->city(),
            'description' => "We are looking for a highly motivated and talented " . $profile['title'] . " Intern to join our world-class technology team. This is a unique opportunity to gain hands-on experience by working on real-world projects that impact millions of users. " . $fakerEn->paragraph(1),
            'requirements' => fake()->randomElements($profile['skills'], $skillsCount),
            'responsibilities' => [
                ['title' => 'Primary Responsibilities', 'items' => fake()->randomElements($profile['responsibilities'], $responsibilitiesCount)],
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
