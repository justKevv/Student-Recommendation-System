# Student Recommendation System

An intelligent internship matching platform built with Laravel that connects students with suitable internship opportunities using AI-powered recommendations.

## About This Project

The Student Recommendation System is a comprehensive web application designed to streamline the internship application process for university students. Built with Laravel and powered by machine learning algorithms, this platform provides intelligent matching between students and internship opportunities based on their skills, experience, and preferences.

### Key Features

- **AI-Powered Recommendations**: Machine learning algorithms analyze student profiles and match them with relevant internship opportunities
- **Multi-Role System**: Support for Students, Supervisors, and Administrators with role-specific dashboards
- **Smart Profile Building**: Students can showcase their skills, projects, experience, and certifications
- **Application Management**: Complete application lifecycle from submission to approval/rejection
- **Supervisor Assignment**: Automatic assignment of supervisors for accepted internships
- **Real-time Tracking**: Monitor application status and internship progress
- **Report Generation**: Weekly and monthly internship reports with CSV export functionality
- **Company Management**: Comprehensive company profiles with detailed internship postings

### Technology Stack

- **Backend**: Laravel 12.0 with PHP 8.2+
- **Frontend**: Blade templates with TailwindCSS 4.1.5 and Alpine.js 3.14.9
- **Database**: MySQL with session-based authentication
- **File Storage**: ImageKit for image management and CV uploads
- **UI Components**: Preline UI components with Dropzone for file uploads
- **AI/ML**: FastAPI recommendation service with ML-powered job matching
- **Development**: Laravel Sail, Vite 6.2.4 for asset compilation
- **Debugging**: Laravel Debugbar for development

## User Roles

#### Students
- Create comprehensive profiles with skills, experience, projects, and certifications
- Receive AI-powered internship recommendations based on their profile
- Apply for internships with one-click application
- Track application status in real-time
- Generate weekly and monthly internship reports
- Upload and manage CV files

#### Supervisors
- Monitor assigned student internships
- Review student progress and logs
- Provide feedback and guidance
- Generate supervision reports

#### Administrators
- Manage internship postings and company profiles
- Review and approve/reject student applications
- Assign supervisors to accepted applications
- Generate system-wide analytics and reports
- Manage user accounts and roles

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL or PostgreSQL database
- ImageKit account for file storage
- FastAPI recommendation service (optional for AI features)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/justKevv/Student-Recommendation-System.git
   cd Student-Recommendation-System
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure your `.env` file**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=student_recommendation
   DB_USERNAME=your_username
   DB_PASSWORD=your_password

   IMAGEKIT_PUBLIC_KEY=your_imagekit_public_key
   IMAGEKIT_PRIVATE_KEY=your_imagekit_private_key
   IMAGEKIT_URL_ENDPOINT=your_imagekit_url_endpoint
   ```

6. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

### Running with Laravel Sail (Docker)

If you prefer using Docker, you can use Laravel Sail:

```bash
composer install
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```

## Configuration

### ImageKit Setup

1. Create an account at [ImageKit.io](https://imagekit.io)
2. Get your Public Key, Private Key, and URL Endpoint
3. Add these credentials to your `.env` file

### AI Recommendation Service

The system integrates with a FastAPI-based recommendation service: [https://github.com/justKevv/Recommendation-API](https://github.com/justKevv/Recommendation-API)

**Key Features:**
- **Job Category Prediction**: Uses TF-IDF vectorization and Random Forest classification
- **Intelligent Recommendations**: Employs sentence transformers for semantic similarity matching
- **Location-Based Ranking**: Incorporates geographical proximity using geolocation data
- **Caching System**: Efficient geocoding cache to minimize API calls

**Setup Instructions:**
For detailed setup instructions, model requirements, and configuration options, please refer to the [Recommendation API repository](https://github.com/justKevv/Recommendation-API).

## Usage

### For Students

1. **Complete Your Profile**: Add skills, experience, projects, and certifications
2. **Browse Internships**: View available opportunities with detailed descriptions
3. **Get Recommendations**: Receive AI-powered suggestions based on your profile
4. **Apply for Internships**: Submit applications with one click
5. **Track Progress**: Monitor application status and internship activities

### For Administrators

1. **Manage Companies**: Add and update company profiles
2. **Post Internships**: Create detailed internship opportunities
3. **Review Applications**: Approve or reject student applications
4. **Assign Supervisors**: Match students with appropriate supervisors
5. **Generate Reports**: Access system analytics and insights

## API Integration

The system includes API endpoints for:

- **Category Prediction**: `POST /api/v1/predict-category`
  - Predicts suitable job categories from student profile text
  - Request: `{"profile_text": "student profile description"}`
  - Response: `{"predicted_category": "Data Science"}`

- **Internship Recommendations**: `POST /api/v1/recommend-internships`
  - Returns ranked internship IDs based on profile matching and location
  - Uses semantic similarity and geographical proximity for ranking
  - Includes profile text, predicted category, preferred location, and internship data

- **Application Management**: Various CRUD operations for managing student applications and internship data

## Development

### Code Style

The project follows PSR-12 coding standards. Run code formatting:

```bash
composer run-script dev
```

### Database

The application uses Eloquent ORM with the following main models:
- `Student` - Student profiles and preferences
- `Internship` - Internship opportunities
- `InternshipApplication` - Application management
- `Company` - Company profiles
- `Supervisors` - Academic supervisors
- `Admin` - Administrative users

### Frontend

- **TailwindCSS** for styling
- **Alpine.js** for interactive components
- **Blade** templating engine
- **Vite** for asset compilation

## Contributing

We welcome contributions to the Student Recommendation System! Please follow these guidelines:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

Please ensure your code follows PSR-12 standards and includes appropriate documentation.

## Code of Conduct

This project follows the Contributor Covenant Code of Conduct. By participating, you are expected to uphold this code.

## Security Vulnerabilities

If you discover a security vulnerability within this Student Recommendation System, please send an e-mail to the project maintainers. All security vulnerabilities will be promptly addressed.

## License

The Student Recommendation System is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
