public class Modul {
    private int id;
    private String bezeichnung;
    private int studentid;
    private int pruefungid;




    public Modul(int id, String bezeichnung, int studentid, int pruefungid) {
        this.id = id;
        this.bezeichnung = bezeichnung;
        this.studentid = studentid;
        this.pruefungid = pruefungid;

    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getBezeichnung() {
        return bezeichnung;
    }

    public void setBezeichnung(String bezeichnung) {
        this.bezeichnung = bezeichnung;
    }

    public int getStudentid() {
        return studentid;
    }

    public void setStudentid(int studentid) {
        this.studentid = studentid;
    }

    public int getPruefungid() {
        return pruefungid;
    }

    public void setPruefungid(int pruefungid) {
        this.pruefungid = pruefungid;
    }
}
