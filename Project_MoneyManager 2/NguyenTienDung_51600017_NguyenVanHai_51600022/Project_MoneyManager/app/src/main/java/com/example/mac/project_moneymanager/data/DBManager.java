package com.example.mac.project_moneymanager.data;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;
import android.widget.Toast;

import com.example.mac.project_moneymanager.model.Customer;
import com.example.mac.project_moneymanager.model.Infomation;

import java.util.ArrayList;
import java.util.List;


//extends SQLiteOpenHelper de co the su dung sql online

public class DBManager extends SQLiteOpenHelper {


    //khai bao bien
    private static final String DATABASE_NAME="infocustomer_manager1";
    private static final String TABLE_NAME="infocustomer";
    private static final String ID="id";
    private static final String USERNAME="username";
    private static final String PASSWORD="password";
    private static final String REPASSWORD="repassword";

    private static final String TABLE_NAME1="infomationcus";
    private static final String TABLE_NAME2="infomationcusback";
    private static final String TABLE_NAME3="infomationcusnext";
    private static final String NUMBERCOST ="numbercost";
    private static final String GROUP="groups";
    private static final String NOTE="note";
    private static final String DATE="date";
    private static final String MONEY="money";
    private static final String WHO="who";

    private static int VERSION = 1;

    private Context context;

    //table chua du lieu username & password cua nguoi dung
    private String SQLQuery = "CREATE TABLE " + TABLE_NAME + "(" +
            ID + " integer primary key, " +
            USERNAME + " TEXT, "+
            PASSWORD + " TEXT, "+
            REPASSWORD + " TEXT )";

    //table chua du lieu trong thang hien tai cua nguoi dung
    private String SQLQuery1 = "CREATE TABLE " + TABLE_NAME1 + "(" +
            ID + " integer primary key, " +
            NUMBERCOST + " integer, " +
            GROUP + " TEXT, "+
            NOTE + " TEXT, "+
            DATE + " TEXT, "+
            MONEY + " TEXT, "+
            WHO + " TEXT )";

    //table chua du lieu trong thang truoc cua nguoi dung
    private String SQLQuery2 = "CREATE TABLE " + TABLE_NAME2 + "(" +
            ID + " integer primary key, " +
            NUMBERCOST + " integer, " +
            GROUP + " TEXT, "+
            NOTE + " TEXT, "+
            DATE + " TEXT, "+
            MONEY + " TEXT, "+
            WHO + " TEXT )";

    //table chua du lieu trong thang tiep theo cua nguoi dung
    private String SQLQuery3 = "CREATE TABLE " + TABLE_NAME3 + "(" +
            ID + " integer primary key, " +
            NUMBERCOST + " integer, " +
            GROUP + " TEXT, "+
            NOTE + " TEXT, "+
            DATE + " TEXT, "+
            MONEY + " TEXT, "+
            WHO + " TEXT )";

    public DBManager(Context context) {
        super(context, DATABASE_NAME, null, VERSION);
        Log.d("DBManager", "DBManager: ");
        this.context = context;
    }

    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
        sqLiteDatabase.execSQL(SQLQuery);//cau lenh truy van
        sqLiteDatabase.execSQL(SQLQuery1);
        sqLiteDatabase.execSQL(SQLQuery2);
        sqLiteDatabase.execSQL(SQLQuery3);
        Log.d("DBManager", "creat: ");
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
        Log.d("DBManager", "update: ");
    }
    //lay thong tin nguoi dung nhap vao va add vao table quan li thong tin nguoi dung
    public void addAccountCustomer(Customer customer){
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put(USERNAME,customer.getUsername());
        values.put(PASSWORD,customer.getPassword());
        values.put(REPASSWORD,customer.getRepassword());

        db.insert(TABLE_NAME,null,values);
        db.close();
        Log.d("DBManager", "successful: ");
    }

    //lay thong tin nguoi dung nhap vao va add vao table 1
    public void addInfomationr(Infomation infomation){
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues values1 = new ContentValues();
        values1.put(NUMBERCOST,infomation.getNumbercost());
        values1.put(GROUP,infomation.getGroups());
        values1.put(NOTE,infomation.getNote());
        values1.put(DATE,infomation.getDate());
        values1.put(MONEY,infomation.getMoney());
        values1.put(WHO,infomation.getHow());

        db.insert(TABLE_NAME1,null,values1);
        db.close();
        Log.d("DBManager", "successful: ");
    }

    //lay thong tin nguoi dung nhap vao va add vao table 3
    public void addInfomationTL(Infomation infomation){
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues values1 = new ContentValues();
        values1.put(NUMBERCOST,infomation.getNumbercost());
        values1.put(GROUP,infomation.getGroups());
        values1.put(NOTE,infomation.getNote());
        values1.put(DATE,infomation.getDate());
        values1.put(MONEY,infomation.getMoney());
        values1.put(WHO,infomation.getHow());

        db.insert(TABLE_NAME3,null,values1);
        db.close();
        Log.d("DBManager", "successful: ");
    }

    //check thong tin cua nguoi dung.(bao mat)
    public boolean checkCustomer(String username ,String password ){
        String selectQuery = "SELECT  * FROM " + TABLE_NAME;

        SQLiteDatabase db = this.getWritableDatabase();
        Cursor cursor = db.rawQuery(selectQuery, null);

        if (cursor.moveToFirst()) {
            do {
                if(cursor.getString(1).equals(username) && cursor.getString(2).equals(password)){
                    return true;
                }
            } while (cursor.moveToNext());
        }
        cursor.close();
        db.close();
        return false;
    }
    public Double checkCustomer(){
        String selectQuery = "SELECT  * FROM " + TABLE_NAME1;
        double sum = 0;
        SQLiteDatabase db = this.getWritableDatabase();
        Cursor cursor = db.rawQuery(selectQuery, null);

        if (cursor.moveToFirst()) {
            do {
                sum = cursor.getDouble(1) + sum;

            } while (cursor.moveToNext());
        }
        cursor.close();
        db.close();
        return sum;
    }

    //cap nhap du lieu dang co trong table vao mang arraylist
    public List<Infomation> getInfomation(){
        List<Infomation> listInfomation = new ArrayList<>();
        String selectQuery = "SELECT  * FROM " + TABLE_NAME1;

        SQLiteDatabase db = this.getWritableDatabase();
        Cursor cursor = db.rawQuery(selectQuery, null);

        if (cursor.moveToFirst()) {
            do {
                    Infomation infomation = new Infomation();
                    infomation.setmID(cursor.getInt(0));
                    infomation.setNumbercost(cursor.getDouble(1));
                    infomation.setGroups(cursor.getString(2));
                    infomation.setNote(cursor.getString(3));
                    infomation.setDate(cursor.getString(4));
                    infomation.setMoney(cursor.getString(5));
                    infomation.setHow(cursor.getString(6));
                    listInfomation.add(infomation);

            } while (cursor.moveToNext());
        }
        cursor.close();
        db.close();
        return listInfomation;
    }
    public int deleteInfomation(int id){
        SQLiteDatabase db = this.getWritableDatabase();
        return db.delete(TABLE_NAME1,ID+"=?",new String[]{String.valueOf(id)});
    }

    //test
    public void hello(){
        Toast.makeText(context, "HELLO", Toast.LENGTH_SHORT).show();
    }
}
