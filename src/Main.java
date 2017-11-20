
import com.mysql.fabric.jdbc.FabricMySQLDriver;

import java.sql.*;
import java.util.ArrayList;

public class Main {
    private static final String URL = "jdbc:mysql://localhost:3306/uni";
    private static final String USERNAME = "root";
    private static final String PASSWORD = "lnxbudet1delitnax";

    public static void main(String[] args) {
        Connection connection;
        Statement statement;
        try {
            Driver driver = new FabricMySQLDriver();
            DriverManager.registerDriver(driver);
            connection = DriverManager.getConnection(URL, USERNAME, PASSWORD);
            statement = connection.createStatement();
            int i = 6;
            statement.execute("INSERT INTO lehrer VALUES("+(i+5)+", 'Pascal')");
            statement.execute("INSERT INTO student VALUES("+i+", 'Nurdoolot')");
            statement.execute("INSERT INTO modul VALUES("+i+", 'OOSE',"+i+","+i+")");
            statement.execute("INSERT INTO pruefung VALUES("+i+", 'OOSE_Klausur')");
            statement.execute("INSERT INTO lehrerModul VALUES("+i+", "+i+")");

            ResultSet resultSet = statement.executeQuery("select lehrer.name, modul.bezeichnung from lehrermodul " +
                    "inner join lehrer on lehrermodul.lehrerId = lehrer.id " +
                    "inner join modul on lehrermodul.modulId = modul.id;");
            System.out.println("Lehrer:     "+"     Modul:");
            while (resultSet.next()){
                System.out.println(resultSet.getString("name")+"\t\t\t"+resultSet.getString("bezeichnung"));
            }
            System.out.println();
            ResultSet resultSet1 = statement.executeQuery("select modul.bezeichnung, student.name, pruefung.bezeichnung from modul" +
                    " inner join student on modul.studentId = student.id" +
                    " inner join pruefung on modul.pruefungId = pruefung.id;");
            System.out.println("Bezeichnung:     "+"     Student:       "+"Pruefung:");
            while (resultSet1.next()){
                System.out.println(resultSet1.getString("bezeichnung")+"\t\t\t"+resultSet1.getString("name")+"\t\t\t"+resultSet1.getString("pruefung.bezeichnung"));
            }
            connection.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
