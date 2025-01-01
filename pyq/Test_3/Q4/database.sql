-- Create the courses table if it doesn't exist
CREATE TABLE IF NOT EXISTS courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL
);

-- Insert sample data into the courses table
INSERT INTO courses (course_name) VALUES
('Mathematics'),
('Physics'),
('Chemistry'),
('Biology'),
('Computer Science'),
('History'),
('Geography'),
('English Literature'),
('Economics'),
('Psychology');