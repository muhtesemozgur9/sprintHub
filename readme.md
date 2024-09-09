### SprintHub - Task Planning and Assignment System

**SprintHub** is a Laravel-based web application designed to manage and distribute tasks from two different API sources (mock data). The system automatically assigns tasks to a team of developers based on their capacity and working hours, ensuring that tasks are completed in the shortest possible time. Each developer is assumed to work 45 hours per week, and tasks are distributed based on developer capacity and task difficulty.

---

### Project Overview

**Goal**:
The main objective of SprintHub is to distribute tasks with varying difficulties and durations across five developers. Each developer has a different task capacity and a limit of 45 working hours per week. The system calculates how many weeks it will take to complete all tasks, ensuring the workload is distributed as efficiently as possible.

---

### Features

- **Multiple Task Sources**: The system integrates two different mock data APIs to retrieve tasks. These mock datasets have different formats, and SprintHub normalizes them into a standard format.
- **Developer Assignment**: Based on task difficulty and developer capacity, tasks are assigned to the most appropriate developer with enough available hours.
- **Efficient Planning**: The algorithm ensures tasks are completed in the shortest time possible, minimizing the total number of weeks needed.
- **Task Overview**: A user-friendly interface shows each developer's assigned tasks, their difficulty, and the remaining available hours.
- **Total Week Calculation**: SprintHub computes the minimum number of weeks required to complete all tasks based on the developers' 45-hour weekly limit.

---

### Data Structure

#### Developer Information:
The developers in SprintHub are categorized by their capacity and working hours:
```php
$developers = [
    ['name' => 'DEV1', 'capacity' => 1x, 'hours' => 45],
    ['name' => 'DEV2', 'capacity' => 2x, 'hours' => 45],
    ['name' => 'DEV3', 'capacity' => 3x, 'hours' => 45],
    ['name' => 'DEV4', 'capacity' => 4x, 'hours' => 45],
    ['name' => 'DEV5', 'capacity' => 5x, 'hours' => 45],
];
```

#### Task Data:
SprintHub retrieves tasks from two mock data sources and converts them into a unified format:
- **Mock Data 1**:
    - `zorluk`: Task difficulty (1-5)
    - `sure`: Estimated time to complete the task
- **Mock Data 2**:
    - `value`: Task difficulty (1-7)
    - `estimated_duration`: Estimated time to complete the task

Both datasets are normalized into a format like:
```php
[
    'task_name' => 'Task 1',
    'difficulty' => 3,
    'duration' => 5,
];
```

---

### How SprintHub Works

1. **Fetch Data**: SprintHub fetches task data from two mock APIs. The fetched data is normalized into a standard structure.
2. **Task Assignment**: The task assignment algorithm distributes tasks to the developers based on their capacity. Each task has a difficulty and duration, and only developers with the appropriate capacity can be assigned the task.
3. **Workload Management**: Each developer has 45 hours of available time per week. Tasks are assigned to developers until their time runs out for the week.
4. **Minimum Weeks Calculation**: After distributing all tasks, the system calculates how many weeks it will take to complete all tasks based on the workload.

---

### Installation

To set up SprintHub on your local machine:

1. **Clone the repository**:
   ```bash
   git clone <repository_url>
   cd SprintHub
   ```

2. **Set up Docker environment**:
   Ensure Docker is installed and running on your machine. You can use the provided `docker-compose.yml` file to run the Laravel app and the MySQL database:
   ```bash
   docker-compose up -d
   ```

3. **Install dependencies**:
   Enter the Docker container and install the required dependencies:
   ```bash
   docker-compose exec app bash
   composer install
   ```

4. **Environment setup**:
   Create a `.env` file by copying `.env.example`:
   ```bash
   cp .env.example .env
   ```
   Then, generate an application key:
   ```bash
   php artisan key:generate
   ```

5. **Database Migration**:
   Run the migrations to set up the database schema:
   ```bash
   php artisan migrate
   ```

6. **Seed Database** (Optional):
   Seed the database with test data if required:
   ```bash
   php artisan db:seed
   ```

7. **Run the Application**:
   Once everything is set up, you can access SprintHub via:
   ```
   http://localhost:8090
   ```

---

### Usage

1. Visit the home page to view the task assignment for each developer.
2. You will see:
    - Each developer’s assigned tasks
    - Task name, duration, and difficulty
    - The remaining available hours for each developer
    - The total minimum number of weeks required to complete all tasks
3. The interface is built using Bootstrap for responsive design, and tasks are listed in a card-based layout.

---

### Future Enhancements

- **Additional Task Sources**: The system can easily be extended to include more task sources in the future.
- **Task Prioritization**: Introduce task priority levels to manage critical tasks first.
- **Dynamic Developer Capacity**: Allow for more flexible developer configurations (e.g., varying weekly hours or task types).

---

### Technologies Used

- **Backend**: Laravel (PHP 8.x)
- **Database**: MySQL (via Docker)
- **Frontend**: Bootstrap, Blade templating engine
- **Containerization**: Docker for both the application and database

---

### Contributing

Contributions are welcome! Please fork the repository, create a feature branch, and submit a pull request.

---

### License

This project is licensed under the MIT License.

---

### Contact

For questions or suggestions, please contact us at `ozgurtiskaya@gmail.com`.