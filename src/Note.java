public class Note{
    private  int id;
    private int studentId;
    private int modulId;
    private int note;

    public Note(int id, int studentId, int modulId, int note) {
        this.id = id;
        this.studentId = studentId;
        this.modulId = modulId;
        this.note = note;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getStudentId() {
        return studentId;
    }

    public void setStudentId(int studentId) {
        this.studentId = studentId;
    }

    public int getModulId() {
        return modulId;
    }

    public void setModulId(int modulId) {
        this.modulId = modulId;
    }

    public int getNote() {
        return note;
    }

    public void setNote(int note) {
        this.note = note;
    }
}
