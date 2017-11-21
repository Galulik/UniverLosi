import com.mysql.fabric.jdbc.FabricMySQLDriver;

import java.sql.*;
import java.util.Random;

public class Main2 {
    private static final String URL = "jdbc:mysql://localhost:3306/uni";
    private static final String USERNAME = "root";
    private static final String PASSWORD = "root";
    private static final Random rnd = new Random(2);

    public static void main(String[] args) {
        Connection connection;
        Statement statement;
        try {
            Driver driver = new FabricMySQLDriver();
            DriverManager.registerDriver(driver);
            connection = DriverManager.getConnection(URL, USERNAME, PASSWORD);
            statement = connection.createStatement();
            for (int j = 1; j < 6; j++) {
                for (int f = 1; f < 6; f++) {
                    statement.execute("INSERT INTO note (studentId,modulId, note) VALUES(" + j + ", " + f + "," + rnd.nextInt(6) + ")");
                }
            }
            System.out.println("saaaaaaaaaaaaaaaaaaaaa");
            connection.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}