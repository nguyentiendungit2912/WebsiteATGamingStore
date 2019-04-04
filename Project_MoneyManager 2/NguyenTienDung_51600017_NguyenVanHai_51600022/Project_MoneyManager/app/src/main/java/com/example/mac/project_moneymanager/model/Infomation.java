package com.example.mac.project_moneymanager.model;

public class Infomation {
    private int mID;
    private double numbercost;
    private String groups;
    private String note;
    private String date;
    private String Money;
    private String how;

    public Infomation(){

    }
    public Infomation(double numbercost, String groups, String note, String date, String money, String how) {
        this.numbercost = numbercost;
        this.groups = groups;
        this.note = note;
        this.date = date;
        Money = money;
        this.how = how;
    }

    public Infomation(int mID, double numbercost, String groups, String note, String date, String money, String how) {
        this.mID = mID;
        this.numbercost = numbercost;
        this.groups = groups;
        this.note = note;
        this.date = date;
        Money = money;
        this.how = how;
    }

    public int getmID() {
        return mID;
    }

    public void setmID(int mID) {
        this.mID = mID;
    }

    public double getNumbercost() {
        return numbercost;
    }

    public void setNumbercost(double numbercost) {
        this.numbercost = numbercost;
    }

    public String getGroups() {
        return groups;
    }

    public void setGroups(String groups) {
        this.groups = groups;
    }

    public String getNote() {
        return note;
    }

    public void setNote(String note) {
        this.note = note;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getMoney() {
        return Money;
    }

    public void setMoney(String money) {
        Money = money;
    }

    public String getHow() {
        return how;
    }

    public void setHow(String how) {
        this.how = how;
    }
}
